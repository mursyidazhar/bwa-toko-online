<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'users_id',
        'insurance_price',
        'shipping_price',
        'total_price',
        'transaction_status',
        'code'
    ];

    protected $hidden = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transactions_id', 'id');
    }
}
