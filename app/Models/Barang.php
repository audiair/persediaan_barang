<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_barang';

    public $incrementing = false;

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    protected $fillable = [
        'id_barang',
        'nama_barang',
        'id_kategori',
        'stok',
        'satuan',
    ];
}
