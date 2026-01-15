<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Временно отключаем timestamps если их нет в таблице
     */
    public $timestamps = false;

    /**
     * Поля, которые можно массово заполнять
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Поля, которые должны быть скрыты
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Преобразование типов
     */
    protected $casts = [
        'password' => 'hashed',
    ];

    public function news()
    {
        return $this->hasMany(News::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
