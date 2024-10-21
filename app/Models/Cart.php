<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Game;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id', 
        'qty'
    ];

    public function game(){
        return $this->belongsTo(Game::class); // Ubah menjadi menggunakan sintaks ::class
    }
}
