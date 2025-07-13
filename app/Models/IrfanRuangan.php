<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IrfanRuangan extends Model
{
    public function barangs()
    {
        return $this->hasMany(IrfanBarang::class, 'ruangan_id');
    }
}
