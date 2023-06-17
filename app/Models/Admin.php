<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = "admins";
    protected $primaryKey = "id_admin";

    protected $hidden = [
        'id_admin',
        'password',
        'nik',
    ];
}
