<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";
    protected $primaryKey = "id_brand";

    public $timestamps = false;

    protected $fillable = ['brand', 'slug_brand', 'logo'];

    public function products()
    {
        return $this->hasMany(Product::class, 'id_brand');
    }
}
