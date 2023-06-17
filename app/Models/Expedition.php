<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    use HasFactory;

    protected $table = "expeditions";
    protected $primaryKey = "id_expedition";

    public $timestamps = false;

    protected $fillable = [
        'vendor',
        'kota_tujuan',
        'fee',
    ];


    public function deliveries()
    {
        return $this->hasMany(Delivery::class, 'id_expedition');
    }
}
