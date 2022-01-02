<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(ModelsUser::class, 'user_id');
    }

    public function details(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

}
