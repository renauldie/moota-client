<?php

namespace App\Http\Controllers;

use App\Models\AccountNumber;
use App\Models\AccountNumberResponse;
use App\Models\AccountNumberResponseDetail;
use App\Models\Parameter;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MootaIntegrationController extends Controller
{
    public function synchronizeAccount() {
        // get account user
        $accounts = AccountNumber::all()->take(1000)->where('sch_status', 0);
        // get endpoint
        $endpoint = Parameter::where('name', 'URL_MOOTA')->first();
        // dd($endpoint->values);
        foreach ($accounts as $account) {
            try {
                $pass = Crypt::decrypt($account->password);
            } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
                continue;
            }

            $url = $endpoint->values.'/bank/store';

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

        return response()->json([
            'status' => 'success',
            'message' => 'synchronize'
        ]);
    }

    private function generateToken() {
        // get moota endpoint from db
        $url = Parameter::where('name', 'URL_MOOTA')->get();
        // dd($request);
        // $request = array(
        //     "email" => $request->email,
        //     "password" => $request->password,
        //     "scopes" => $request->scopes
        // );

        return response()->json([
            'status' => 'success',
            'data' => $url
        ]);
    }

    public function logout() {

    }

    public function mpost() {

    }

    public function postAccount(){
        
    }

}
