<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IrfanKategori extends Model
{
    public function barangs()
    {
        return $this->hasMany(IrfanBarang::class, 'kategori_id');
    }
}
