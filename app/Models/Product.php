<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $primaryKey = "id_product";

    protected $fillable = ['product_name', 'slug_product', 'description', 'id_brand', 'id_category'];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id_product');
    }


    public function variants()
    {
        return $this->hasMany(Variant::class, 'id_product');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_product');
    }


    public function detail_transaction()
    {
        return $this->hasMany(DetailTransaction::class, 'id_product');
    }


    public function review()
    {
        return $this->hasMany(Review::class, 'id_product');
    }
}
