@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.hotel.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.hotels.update", [$hotel->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('hotel_name') ? 'has-error' : '' }}">
                            <label class="required" for="hotel_name">{{ trans('cruds.hotel.fields.hotel_name') }}</label>
                            <input class="form-control" type="text" name="hotel_name" id="hotel_name" value="{{ old('hotel_name', $hotel->hotel_name) }}" required>
                            @if($errors->has('hotel_name'))
                                <span class="help-block" role="alert">{{ $errors->first('hotel_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hotel.fields.hotel_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                            <label for="phone_number">{{ trans('cruds.hotel.fields.phone_number') }}</label>
                            <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $hotel->phone_number) }}">
                            @if($errors->has('phone_number'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hotel.fields.phone_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email_address') ? 'has-error' : '' }}">
                            <label for="email_address">{{ trans('cruds.hotel.fields.email_address') }}</label>
                            <input class="form-control" type="text" name="email_address" id="email_address" value="{{ old('email_address', $hotel->email_address) }}">
                            @if($errors->has('email_address'))
                                <span class="help-block" role="alert">{{ $errors->first('email_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hotel.fields.email_address_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection