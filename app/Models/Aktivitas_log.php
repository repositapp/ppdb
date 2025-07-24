<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas_log extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = false;

    protected $dates = ['waktu'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
