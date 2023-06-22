<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $table = "detail_transaction";
    // protected $primaryKey = null;

    public $timestamps = false;

    protected $fillable = [
        'id_product',
        'id_transaction',
        'id_variant',
        'qty',
        'discount',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class, 'id_variant');
    }
}
