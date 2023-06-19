<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionTrack extends Model
{
    use HasFactory;

    protected $table = "transactions_track";
    // protected $primaryKey = null;

    public $timestamps = false;

    protected $fillable = ['id_transaction', 'id_status_transaction', 'handle_at'];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }

    public function status_transaction()
    {
        return $this->belongsTo(StatusTransaction::class, 'id_status_transaction');
    }
}
