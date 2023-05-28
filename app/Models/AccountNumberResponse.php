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

    public function detail()
    {
        return $this->hasOne(AccountNumberResponseDetail::class, 'account_number_response_id');
    }
}
