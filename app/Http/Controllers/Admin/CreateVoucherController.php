<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\CreateVoucher;
use App\Hotel;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCreateVoucherRequest;
use App\Http\Requests\StoreCreateVoucherRequest;
use App\Http\Requests\UpdateCreateVoucherRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use PDF;

class CreateVoucherController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('create_voucher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createVouchers = CreateVoucher::with(['agent', 'client', 'hotel_name'])->get();

        $users = User::get();

        $clients = Client::get();

        $hotels = Hotel::get();

        return view('admin.createVouchers.index', compact('clients', 'createVouchers', 'hotels', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('create_voucher_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hotel_names = Hotel::pluck('hotel_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.createVouchers.create', compact('agents', 'clients', 'hotel_names'));
    }

    public function store(StoreCreateVoucherRequest $request)
    {
        $dateFrom = \Carbon\Carbon::createFromFormat('d-m-Y', $request->arrivaldate);
        $dateTo = \Carbon\Carbon::createFromFormat('d-m-Y', $request->departuredate);
        $request['night'] = $dateFrom->diffInDays($dateTo);
        $request['total_amount'] = $request->room_price * $request->number_of_room * $request->night;
        $createVoucher = CreateVoucher::create($request->all());

        return redirect()->route('admin.create-vouchers.index');
    }

    public function edit(CreateVoucher $createVoucher)
    {
        abort_if(Gate::denies('create_voucher_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agents = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('fullname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hotel_names = Hotel::pluck('hotel_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $createVoucher->load('agent', 'client', 'hotel_name');

        return view('admin.createVouchers.edit', compact('agents', 'clients', 'createVoucher', 'hotel_names'));
    }

    public function update(UpdateCreateVoucherRequest $request, CreateVoucher $createVoucher)
    {
        $createVoucher->update($request->all());

        return redirect()->route('admin.create-vouchers.index');
    }

    public function show(CreateVoucher $createVoucher)
    {
        abort_if(Gate::denies('create_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createVoucher->load('agent', 'client', 'hotel_name');

        return view('admin.createVouchers.show', compact('createVoucher'));
    }

    public function destroy(CreateVoucher $createVoucher)
    {
        abort_if(Gate::denies('create_voucher_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createVoucher->delete();

        return back();
    }

    public function massDestroy(MassDestroyCreateVoucherRequest $request)
    {
        CreateVoucher::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getpdf($VoucherId)
    {
        abort_if(Gate::denies('create_voucher_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $createVoucher = CreateVoucher::findOrFail($VoucherId);

        $createVoucher->load('agent', 'client', 'hotel_name');

        $pdf = PDF::loadView('admin.createVouchers.getpdf', compact('createVoucher'));

        return $pdf->download('voucher.pdf');
    }
}
