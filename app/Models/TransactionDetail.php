<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    public $timestamps = false;

    public function transactionHeader(){
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function furnitures(){
        return $this->belongsTo(Furniture::class, 'furniture_id')->withTrashed(); // Baca soft deleted too
    }
}
