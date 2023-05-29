<?php

namespace App\Console\Commands;

use App\Models\Parameter;
use Illuminate\Console\Command;

class SynchronizeMutation extends Command
{
    protected $signature = 'sync:mutation_get';
    protected $description = 'Command description';

    public function handle(): void
    {
        // localhost:8001/api/v2/mutation?type=cr&bank=ovo&amount=1000&description=e&note=e&date=e&start_date=2023-05-29&end_date=2023-05-29&tag=a&page=1&per_page=10
        $endpoint = Parameter::where('name', 'URL_MOOTA')->first();
        $url = $endpoint->values.'/mutation?'.'type='.'cr'.'&bank='.'ovo'.'&amount='.'1000'.'&description='.'e'.'&note='.'e'.'
                                    &date='.'e'.'&start_date='.'2023-05-29'.'&end_date='.'2023-05-29'.'&tag='.'a'.'&page='.'1'.'&per_page='.'10';


        $this->info('Mutation Synchrinized');
    }

    // public function handle_acount() {
    //     $accounts = AccountNumber::where('is_active', '1')->get();

    //     foreach ($accounts as $acc) {
    //         $acc->is_active = '0';
    //         $acc->save();
    //     }
    // }
}
