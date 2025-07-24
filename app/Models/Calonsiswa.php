<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calonsiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kartuUjian()
    {
        return $this->hasOne(KartuUjian::class);
    }

    public function dokumen()
    {
        return $this->hasOne(Dokumensiswa::class);
    }
}
