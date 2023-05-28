<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class AccStoreRequest extends FormRequest
{

    public function rules(): array
    {
        $acc_num = $this->request->get("account_number");
        
        return [
            'is_active' => [
                'integer',
                'required'
            ],
            'account_number' => [
                'string',
                'required',
                Rule::unique('account_numbers')->ignore($acc_num, 'account_number')
                // 'unique:account_numbers,account_number,except,id'
            ],
            'name_holder' => [
                'string',
                'required'
            ],
            'password' => [
                'string',
                'required'
            ],
            'username' => [
                'string',
                'required'
            ],
            'bank_type' => [
                'string',
                'required'
            ],
            // 'corporate_id' => [
            //     'string'
            // ]
        ];
    }

    // public function authorize()
    // {
    //     return Gate::allows('user_access');
    // }
}
