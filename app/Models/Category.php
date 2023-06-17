<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = "id_category";

    public $timestamps = false;

    protected $fillable = ['category', 'slug_category', 'logo'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_category');
    }

    public function sizes()
    {
        return $this->hasMany(Size::class, 'id_category');
    }
}
