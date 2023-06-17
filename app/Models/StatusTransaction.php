<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusTransaction extends Model
{
    use HasFactory;

    protected $table = "status_transactions";
    protected $primaryKey = "id_status_transaction";

    public $timestamps = false;

    protected $fillable = [
        'status',
    ];


    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_status_transaction');
    }
}
