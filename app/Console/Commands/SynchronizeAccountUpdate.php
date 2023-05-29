<?php

namespace App\Console\Commands;

use App\Models\AccountNumber;
use App\Models\AccountNumberResponse;
use App\Models\AccountNumberResponseDetail;
use App\Models\Parameter;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SynchronizeAccountUpdate extends Command
{
    protected $signature = 'sync:account_update';
    protected $description = 'Command description';

    public function handle(): void
    {
        $accounts = AccountNumber::with(['account_response.detail'])
            ->take(1000)
            ->where('sch_status', 5)
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

            $url = $endpoint->values.'/bank/update/'.$account->account_response->detail->bank_id;

            $this->info($url);

            $reqBody = Http::post($url, [
                'corporate_id' => $account->corporate_id,
                'bank_type' => $account->bank_type,
                'username' => $account->username,
                'password' => $pass,
                'name_holder' => $account->name_holder,
                'is_active' => $account->is_active,
            ]);

            Log::info('check account '.$account->name_holder);

            // // with headers 
            // $response = Http::withHeaders([
            //     'Authorization' => 'Bearer {your_token}',
            //     'Content-Type' => 'application/json',
            // ])->post($url, [
            //     $reqBody
            // ]);

            // no headers
            $response = Http::post($url, [
                $reqBody
            ]);

            // save to db
            if ($response->successful()) {
                Log::info($account->name_holder.'ok'.$response->successful());
                $data = $response->json();

                // dd($bank);
                $accresp = [
                    'balance_before' => $data['balance_before'],
                    'balance' => $data['balance'],
                    'account_id' => $account->id
                ];

                // save balance to db
                $accrespdata = AccountNumberResponse::create($accresp);

                $bank = $data['bank'];
                $accrespdtl = [
                    'account_number_response_id' => $accrespdata->id
                    ,'corporate_id' => $bank['corporate_id']
                    ,'username' => $bank['username']
                    ,'atas_nama' => $bank['atas_nama']
                    ,'balance' => $bank['balance']
                    ,'account_number' => $bank['account_number']
                    ,'bank_type' => $bank['bank_type']
                    ,'pkg' => $bank['pkg'] ? $bank['pkg'] : null
                    ,'login_retry' => $bank['login_retry']
                    ,'date_from' => $bank['date_from']
                    ,'date_to' => $bank['date_to']
                    ,'meta' => $bank['meta'] ? $bank['meta'] : null
                    ,'interval_refresh' => $bank['interval_refresh']
                    ,'next_queue' => $bank['next_queue']
                    ,'is_active' => $bank['is_active']
                    ,'in_queue' => $bank['in_queue']
                    ,'in_progress' => $bank['in_progress']
                    ,'is_crawling' => $bank['is_crawling']
                    ,'recurred_at' => $bank['recurred_at']
                    ,'created_at' => $bank['created_at']
                    ,'token' => $bank['token']
                    ,'bank_id' => $bank['bank_id']
                    ,'label' => $bank['label']
                    ,'last_update' => $bank['last_update']
                    ,'icon' => $bank['icon']
                ];

                // dd($accrespdtl);
                AccountNumberResponseDetail::create($accrespdtl);

                // update status_sch
                $account->sch_status = 1;
                $account->save();
            } else {
                Log::warning($account->name_holder.'exists');
            }
        }

        $this->info('User has been updated successfully.');
    }

    // public function handle_acount() {
    //     $accounts = AccountNumber::where('is_active', '1')->get();

    //     foreach ($accounts as $acc) {
    //         $acc->is_active = '0';
    //         $acc->save();
    //     }
    // }
}
