<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(): void
    {
        Log::info("Cron is working fine!");
        // * * * * * cd /Users/rev/Project/moota-client && php artisan schedule:run >> /dev/null 2>&1

        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
    }
}
