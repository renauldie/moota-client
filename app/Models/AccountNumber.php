<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_active', 'account_number', 'name_holder', 'password', 'name_holder', 
        'username', 'password', 'bank_type', 'corporate_id'
    ];

    protected $hidden =[

    ];
}
