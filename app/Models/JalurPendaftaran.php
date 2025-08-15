<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurPendaftaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function calonSiswas()
    {
        return $this->hasMany(CalonSiswa::class);
    }
}
