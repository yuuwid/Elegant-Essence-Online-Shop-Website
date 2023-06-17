<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = "sizes";
    protected $primaryKey = "id_size";

    public $timestamps = false;


    public function variants()
    {
        return $this->hasMany(Variant::class, 'id_size');
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
}
