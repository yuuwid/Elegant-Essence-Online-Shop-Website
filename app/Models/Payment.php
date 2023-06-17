<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payments";
    protected $primaryKey = "id_payment";

    public $timestamps = false;

    protected $fillable = [
        'metode',
        'no_rek',
        'status',
        'admin_fee',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_payment');
    }
}
