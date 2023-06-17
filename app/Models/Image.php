<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";
    protected $primaryKey = "id_image";

    public $timestamps = false;

    protected $fillable = ['path_image', 'id_product', 'thumnbail'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
