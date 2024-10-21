<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Game; 

class Library extends Model
{
    protected $fillable = ['user_id', 'game_id'];

    // Definisikan relasi dengan model Game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function kategori()
    {
        return $this->game->kategori; // Mengakses relasi kategori dari model Game
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
