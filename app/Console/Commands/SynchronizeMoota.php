<?php

namespace App\Console\Commands;

use App\Models\AccountNumber;
use App\Models\User;
use Illuminate\Console\Command;

class SynchronizeMoota extends Command
{
    protected $signature = 'app:synchronize-moota';
    protected $description = 'Command description';

    public function handle()
    {
        $accounts = AccountNumber::where('is_active', '1')->get();
    
        foreach ($accounts as $acc) {
            $acc->is_active = '0';
            $acc->save();
        }

        $this->info('User statuses updated successfully.');
    }

    public function handle_acount() {
        $accounts = AccountNumber::where('is_active', '1')->get();

        foreach ($accounts as $acc) {
            $acc->is_active = '0';
            $acc->save();
        }

        
    }
}
