<?php

namespace App\Models;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(ModelsUser::class, 'user_id');
    }

    public function details(){
        return $this->hasOne(TransactionDetail::class, 'transaction_id');
    }

}
