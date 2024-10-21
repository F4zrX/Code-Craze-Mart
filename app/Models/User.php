<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens, HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_validated',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_validated' => 'boolean',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function isAdmin()
    {
        return $this->role->name === 'admin';
    }

    public function chatMessages()
    {
        return $this->hasMany(Message::class, 'user_id');
    }
}
