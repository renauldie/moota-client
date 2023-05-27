<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;


class AccStoreRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'is_active' => [
                'integer',
                'required'
            ],
            'account_number' => [
                'string',
                'required'
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
            'corporate_id' => [
                'string',
                'required'
            ]
        ];
    }

    // public function authorize()
    // {
    //     return Gate::allows('user_access');
    // }
}
