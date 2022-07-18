@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.hotel.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hotels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hotel.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $hotel->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hotel.fields.hotel_name') }}
                                    </th>
                                    <td>
                                        {{ $hotel->hotel_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hotel.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $hotel->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.hotel.fields.email_address') }}
                                    </th>
                                    <td>
                                        {{ $hotel->email_address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.hotels.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#hotel_name_create_vouchers" aria-controls="hotel_name_create_vouchers" role="tab" data-toggle="tab">
                            {{ trans('cruds.createVoucher.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="hotel_name_create_vouchers">
                        @includeIf('admin.hotels.relationships.hotelNameCreateVouchers', ['createVouchers' => $hotel->hotelNameCreateVouchers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection