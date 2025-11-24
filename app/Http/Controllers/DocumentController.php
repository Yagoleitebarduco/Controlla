<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importar a classe Storage

class DocumentController extends Controller
{
    // ... (Seu método index() aqui) ...
public function index()
{
    // A view é chamada pelo nome base do arquivo.
    // Ele procurará por resources/views/documents.blade.php
    return view('admin.documentos.documents'); 
}

    /**
     * Handle the file upload request.
     */
    public function store(Request $request)
    {
        // 1. Validação dos Arquivos
        $request->validate([
            // 'files.*' garante que a regra se aplica a cada arquivo no array de 'files'
            'files.*' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx,xls,xlsx|max:10240', // Max 10MB
        ]);

        // 2. Processamento dos Arquivos
        foreach ($request->file('files') as $file) {
            
            // Define o caminho onde o arquivo será salvo (ex: storage/app/public/documents)
            $path = $file->store('public/documents'); 

            // Opcional: Aqui você deve salvar informações no banco de dados
            // Exemplo: Document::create([
            //     'name' => $file->getClientOriginalName(),
            //     'file_path' => Storage::url($path),
            //     'size' => $file->getSize(),
            //     // Outros campos como user_id, type, etc.
            // ]);
        }

        // 3. Redirecionamento com mensagem de sucesso
        return redirect()->route('documents.index')->with('success', 'Documents uploaded successfully!');
    }
}