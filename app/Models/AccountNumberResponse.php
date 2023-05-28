<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountNumberResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'balance_before', 'balance', 'account_id'
    ];

    // protected $hidden =[
    //     'created_at', 'updated-at'
    // ];
}
