<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_name',
        'stored_name',
        'extension',
        'mime_type',
        'size',
        'path',
    ];

    // Relacionamento com o usuário
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Acessor para a URL pública do documento
    public function getUrlAttribute(): string
    {
        return asset($this->path);
    }

    // Acessor para o ícone do documento
    public function getIconAttribute(): string
    {
        return match (strtolower($this->extension)) {
            'pdf' => 'fa-file-pdf text-danger',
            'jpg', 'jpeg', 'png' => 'fa-file-image text-warning',
            'doc', 'docx' => 'fa-file-word text-blue-500',
            'xls', 'xlsx' => 'fa-file-excel text-success',
            default => 'fa-file-alt text-PaynesGray',
        };
    }


    // Acessor para o tamanho formatado
    public function getFormattedSizeAttribute(): string
    {
        $size = $this->size;
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        return round($size, 2) . ' ' . $units[$i];
    }

    // Dentro da classe Document, adicione este método:
    public function getUsedStorageAttribute(): string
    {
        $totalSize = self::where('user_id', $this->user_id)->sum('size');
        return $this->formatBytes($totalSize);
    }

    private function formatBytes($size, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB'];
        for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
            $size /= 1024;
        }
        return round($size, $precision) . ' ' . $units[$i];
    }
}
