<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = "colors";
    protected $primaryKey = "id_color";

    public $timestamps = false;


    public function variants()
    {
        return $this->hasMany(Variant::class, 'id_color');
    }
}
