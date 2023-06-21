<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $table = "deliveries";
    protected $primaryKey = "id_delivery";

    public $timestamps = false;

    protected $fillable = [
        'id_expedition',
        'recipient_name',
        'recipient_phone_number',
        'id_address',
    ];


    public function expedition()
    {
        return $this->belongsTo(Expedition::class, 'id_expedition');
    }


    public function address()
    {
        return $this->belongsTo(Address::class, 'id_address');
    }


    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_delivery');
    }
}
