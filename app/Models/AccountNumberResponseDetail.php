<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountNumberResponseDetail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'account_number_response_id', 'corporate_id', 'username', 'atas_nama', 'balance', 'account_number', 'bank_type', 'pkg', 'login_retry', 'date_from', 
        'date_to', 'meta', 'interval_refresh', 'next_queue', 'is_active', 'in_queue', 'in_progress', 'is_crawling', 
        'recurred_at', 'created_at', 'token', 'bank_id', 'label', 'last_update', 'icon'
    ];
}
