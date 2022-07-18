<?php

namespace App\Http\Requests;

use App\CreateVoucher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCreateVoucherRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('create_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:create_vouchers,id',
        ];
    }
}
