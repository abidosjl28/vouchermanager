@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.createVoucher.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.create-vouchers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                            <a class="btn btn-default" href="{{ route('admin.create-vouchers.getpdf', $createVoucher->id) }}">
                                {{ trans('global.datatables.pdf') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.agent') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->agent->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->client->fullname ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.is_adult') }}
                                    </th>
                                    <td>
                                        {{ App\CreateVoucher::IS_ADULT_SELECT[$createVoucher->is_adult] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.arrivaldate') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->arrivaldate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.departuredate') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->departuredate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.have_children') }}
                                    </th>
                                    <td>
                                        {{ App\CreateVoucher::HAVE_CHILDREN_SELECT[$createVoucher->have_children] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.hotel_name') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->hotel_name->hotel_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.room_type') }}
                                    </th>
                                    <td>
                                        {{ App\CreateVoucher::ROOM_TYPE_SELECT[$createVoucher->room_type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.number_of_room') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->number_of_room }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.night') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->night }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.room_price') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->room_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.total_amount') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->total_amount }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.payment_mode') }}
                                    </th>
                                    <td>
                                        {{ App\CreateVoucher::PAYMENT_MODE_SELECT[$createVoucher->payment_mode] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.observation') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->observation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.service') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->service }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.createVoucher.fields.internal_note') }}
                                    </th>
                                    <td>
                                        {{ $createVoucher->internal_note }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.create-vouchers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection