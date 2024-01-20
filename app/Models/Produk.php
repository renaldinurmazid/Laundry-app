<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produk";
    protected $primarykey = "id";
    protected $fillable = ['id', 'nama_produk', 'harga_produk', 'id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }

}
