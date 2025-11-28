<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::where('user_id', auth()->id())
            ->latest()
            ->get();

        // Calcula o uso total de armazenamento
        $usedSpace = $documents->sum('size');
        $totalSizeFormatted = $this->formatBytes($usedSpace); // Formata o tamanho

        $newThisMonth = $documents->where('created_at', '>=', now()->startOfMonth())->count();

        return view('admin.documentos.documents', compact(
            'documents',
            'totalSizeFormatted',
            'newThisMonth'
        ));
    }

    // Método auxiliar para formatar bytes
    private function formatBytes($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        return round($size, $precision) . ' ' . $units[$i];
    }

    public function store(Request $request)
    {
        // Verifica o limite de armazenamento (5 GB = 5 * 1024 * 1024 * 1024 bytes)
        $limitInBytes = 5 * 1024 * 1024 * 1024;

        // Calcula o uso atual do usuário
        $usedSpace = Document::where('user_id', auth()->id())->sum('size');

        // Soma o tamanho dos novos arquivos
        $newFilesSize = 0;
        foreach ($request->file('files') as $file) {
            $newFilesSize += $file->getSize();
        }

        // Verifica se o novo upload excederá o limite
        if ($usedSpace + $newFilesSize > $limitInBytes) {
            return redirect()->route('documents.index')->with('error', 'Limite de armazenamento excedido. O máximo permitido é 5 GB.');
        }

        // Validação dos arquivos
        $request->validate([
            'files.*' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:10240',
        ]);

        foreach ($request->file('files') as $file) {
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getMimeType();
            $size = $file->getSize();

            // Gera um nome único
            $storedName = time() . '_' . uniqid() . '.' . $extension;

            // Salva o arquivo diretamente na pasta pública
            $destinationPath = public_path('documents');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $file->move($destinationPath, $storedName);

            // Salva o registro no banco de dados
            Document::create([
                'user_id' => auth()->id(),
                'original_name' => $originalName,
                'stored_name' => $storedName,
                'extension' => $extension,
                'mime_type' => $mimeType,
                'size' => $size,
                'path' => 'documents/' . $storedName,
            ]);
        }

        return redirect()->route('documents.index')->with('success', 'Documentos enviados com sucesso!');
    }

    public function destroy(Document $document)
    {
        if ($document->user_id !== auth()->id()) {
            abort(403, 'Você não tem permissão para excluir este documento.');
        }

        // **EXCLUI O ARQUIVO DA PASTA PÚBLICA**
        $filePath = public_path($document->path);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Documento excluído com sucesso!');
    }
}
