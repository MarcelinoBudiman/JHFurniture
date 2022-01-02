<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function transactionHeader(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function furniture(){
        return $this->hasMany(Furniture::class, 'furniture_id');
    }
}
