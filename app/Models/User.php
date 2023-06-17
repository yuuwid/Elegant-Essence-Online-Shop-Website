<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $primaryKey = "id_user";

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'address',
        'phone_number',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
    ];


    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_user');
    }


    public function review()
    {
        return $this->hasMany(Review::class, 'id_user');
    }


    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_user');
    }
}
