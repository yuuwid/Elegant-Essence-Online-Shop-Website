<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "address";
    protected $primaryKey = "id_address";

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'street_name',
        'subdistrict',
        'zip_code',
        'city',
        'province',
        'status',
    ];

    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'id_address');
    }
}
