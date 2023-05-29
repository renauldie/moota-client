<?php

namespace App\Console\Commands;

use App\Models\AccountNumber;
use App\Models\Parameter;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SynchronizeAccountDestroy extends Command
{
    protected $signature = 'sync:account_destroy';
    protected $description = 'Command description';

    public function handle(): void
    {
        // 0 create
        // 1 read from moota
        // 7 destroy
        // 5 update
        $accounts = AccountNumber::with(['account_response.detail'])
            ->take(1000)
            ->where('sch_status', 7)
            ->get();

        // get endpoint
        $endpoint = Parameter::where('name', 'URL_MOOTA')->first();
        // dd($endpoint->values);
        foreach ($accounts as $account) {
            try {
                $pass = Crypt::decrypt($account->password);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                continue;
            }

            $url = $endpoint->values.'/bank/'.$account->account_response->detail->bank_id.'/destroy';

            Log::info('check account '.$account->name_holder);

            $token = env('MOOTA_TOKEN_VALUE');
            // // with headers 
            $response = Http::withHeaders([
                'Authorization' => $token,
                'Content-Type' => 'application/json',
            ])->post($url);

            // // no headers
            // $response = Http::post($url);

            // save to db
            if ($response->successful()) {
                Log::info($account->name_holder.'ok'.$response->successful());
                // update status_sch
                // $account->sch_status = 1;
                // $account->save();

                $account->delete();
            } else {
                Log::warning($account->name_holder.'exists');
            }

            $this->info('User has been destroyed successfully.');
        }
    }

    // public function handle_acount() {
    //     $accounts = AccountNumber::where('is_active', '1')->get();

    //     foreach ($accounts as $acc) {
    //         $acc->is_active = '0';
    //         $acc->save();
    //     }
    // }
}
