<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kartuujian extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $dates = ['tanggal_ujian'];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }
}
