<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    protected $primaryKey = "id_cart";

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_product',
        'id_variant',
        'qty'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'id_variant');
    }
}
