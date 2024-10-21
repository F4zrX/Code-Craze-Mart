<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Game extends Model
{
    protected $guarded = [];
    protected $table = 'games';

    // Definisikan relasi belongsTo ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
