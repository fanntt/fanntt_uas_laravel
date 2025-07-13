<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\IrfanBarang;
use App\Models\User;

class IrfanPeminjaman extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function barang()
    {
        return $this->belongsTo(IrfanBarang::class, 'barang_id');
    }
}
