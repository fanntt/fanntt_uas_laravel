<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IrfanBarang extends Model
{
    protected $fillable = [
        'nama_barang', 'deskripsi', 'stok', 'kategori_id', 'ruangan_id',
    ];
    public function kategori()
    {
        return $this->belongsTo(IrfanKategori::class, 'kategori_id');
    }
    public function ruangan()
    {
        return $this->belongsTo(IrfanRuangan::class, 'ruangan_id');
    }
    public function peminjamans()
    {
        return $this->hasMany(IrfanPeminjaman::class, 'barang_id');
    }
}
