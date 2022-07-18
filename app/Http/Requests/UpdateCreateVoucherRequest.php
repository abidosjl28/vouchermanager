<?php

namespace App\Http\Requests;

use App\CreateVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCreateVoucherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('create_voucher_edit');
    }

    public function rules()
    {
        return [
            'agent_id' => [
                'required',
                'integer',
            ],
            'arrivaldate' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'departuredate' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'hotel_name_id' => [
                'required',
                'integer',
            ],
            'room_type' => [
                'required',
            ],
            'number_of_room' => [
                'string',
                'min:1',
                'max:5',
                'required',
            ],
            'night' => [
                'string',
                'min:1',
                'max:1000',
                'required',
            ],
            'room_price' => [
                'string',
                'min:1',
                'max:20',
                'required',
            ],
            'payment_mode' => [
                'required',
            ],
            'observation' => [
                'string',
                'min:1',
                'max:300',
                'nullable',
            ],
            'service' => [
                'string',
                'min:1',
                'max:300',
                'nullable',
            ],
            'internal_note' => [
                'string',
                'min:1',
                'max:1000',
                'nullable',
            ],
        ];
    }
}
