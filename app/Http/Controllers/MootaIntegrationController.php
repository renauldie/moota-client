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
    public function synchronizeAccountCreate() {
        $accounts = AccountNumber::with(['account_response.detail'])
        ->take(1000)
        ->where('sch_status', 1)
        ->get();
        
        // foreach ($accountNumbers as $accountNumber) {
        //     // Access the joined data
        //     $accountNumberValue = $accountNumber->account_number;
        //     $responseValue = $accountNumber->response->response_data;
        //     $detailValue = $accountNumber->response->detail->detail_data;
        
        //     // Perform your logic with the joined data
        // }

        dd($accounts[0]->account_response->detail->bank_id);
        return response()->json([
            // 'data' => $accounts,
            'data_detail' => $accounts->account_response->detail
        ]);
    }

    public function synchronizeAccountUpdate() {
        
       
    }

    public function logout() {

    }

    public function mpost() {

    }

    public function postAccount(){
        
    }

}
