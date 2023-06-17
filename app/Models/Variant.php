<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;

    protected $table = "variants";
    protected $primaryKey = "id_variant";

    public $timestamps = false;

    protected $fillable = ['id_product', 'price', 'discount', 'stock', 'id_size', 'id_color'];


    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }


    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color');
    }


    public function size()
    {
        return $this->belongsTo(Size::class, 'id_size');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_variant');
    }


    public function detail_transaction()
    {
        return $this->hasMany(DetailTransaction::class, 'id_variant');
    }
}
