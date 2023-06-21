<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $primaryKey = "id_transaction";

    // public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_delivery',
        'id_payment',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detail_transaction()
    {
        return $this->hasMany(DetailTransaction::class, 'id_transaction');
    }


    public function transaction_track()
    {
        return $this->hasMany(TransactionTrack::class, 'id_transaction');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'id_delivery');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }
}
