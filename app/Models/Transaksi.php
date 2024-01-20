<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $fillable = [
        'nomor_unik',
        'id_produk',
        'nama_pelanggan',
        'jumlah_itm_kg',
        'total_harga',
        'uang_bayar',
        'uang_kembali',
        'status',
        'tgl_keluar'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }
    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk', 'id');
    }
}
