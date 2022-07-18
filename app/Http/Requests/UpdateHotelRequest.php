<?php

namespace App\Http\Requests;

use App\Hotel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHotelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hotel_edit');
    }

    public function rules()
    {
        return [
            'hotel_name' => [
                'string',
                'min:1',
                'max:50',
                'required',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'email_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
