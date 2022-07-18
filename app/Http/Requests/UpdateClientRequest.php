<?php

namespace App\Http\Requests;

use App\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_edit');
    }

    public function rules()
    {
        return [
            'fullname' => [
                'string',
                'min:1',
                'max:100',
                'required',
            ],
            'address_1' => [
                'string',
                'min:1',
                'max:100',
                'nullable',
            ],
            'address_2' => [
                'string',
                'min:1',
                'max:100',
                'nullable',
            ],
            'city' => [
                'string',
                'min:1',
                'max:100',
                'required',
            ],
            'phone_number' => [
                'string',
                'min:1',
                'max:30',
                'nullable',
            ],
            'email_address' => [
                'string',
                'min:1',
                'max:30',
                'nullable',
            ],
            'country' => [
                'string',
                'min:0',
                'max:30',
                'required',
            ],
            'passport' => [
                'string',
                'min:1',
                'max:100',
                'nullable',
            ],
            'attachment' => [
                'array',
            ],
        ];
    }
}
