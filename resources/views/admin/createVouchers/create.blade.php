@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.createVoucher.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.create-vouchers.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('agent') ? 'has-error' : '' }}">
                            <label class="required" for="agent_id">{{ trans('cruds.createVoucher.fields.agent') }}</label>
                            <input type="hidden" name="agent_id" value="{{ auth()->user()->id }}">
                            <p>{{ auth()->user()->name }}</p>
                            @if($errors->has('agent'))
                            <span class="help-block" role="alert">{{ $errors->first('agent') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.agent_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('client') ? 'has-error' : '' }}">
                            <label for="client_id">{{ trans('cruds.createVoucher.fields.client') }}</label>
                            <select class="form-control select2" name="client_id" id="client_id">
                                @foreach($clients as $id => $entry)
                                <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client'))
                            <span class="help-block" role="alert">{{ $errors->first('client') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.client_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_adult') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.createVoucher.fields.is_adult') }}</label>
                            <select class="form-control" name="is_adult" id="is_adult">
                                <option value disabled {{ old('is_adult', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\CreateVoucher::IS_ADULT_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('is_adult', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('is_adult'))
                            <span class="help-block" role="alert">{{ $errors->first('is_adult') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.is_adult_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('arrivaldate') ? 'has-error' : '' }}">
                            <label class="required" for="arrivaldate">{{ trans('cruds.createVoucher.fields.arrivaldate') }}</label>
                            <input class="form-control date" type="text" name="arrivaldate" id="arrivaldate" value="{{ old('arrivaldate') }}" required>
                            @if($errors->has('arrivaldate'))
                            <span class="help-block" role="alert">{{ $errors->first('arrivaldate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.arrivaldate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('departuredate') ? 'has-error' : '' }}">
                            <label class="required" for="departuredate">{{ trans('cruds.createVoucher.fields.departuredate') }}</label>
                            <input class="form-control date" type="text" name="departuredate" id="departuredate" value="{{ old('departuredate') }}" required>
                            @if($errors->has('departuredate'))
                            <span class="help-block" role="alert">{{ $errors->first('departuredate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.departuredate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('have_children') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.createVoucher.fields.have_children') }}</label>
                            <select class="form-control" name="have_children" id="have_children">
                                <option value disabled {{ old('have_children', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\CreateVoucher::HAVE_CHILDREN_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('have_children', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('have_children'))
                            <span class="help-block" role="alert">{{ $errors->first('have_children') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.have_children_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hotel_name') ? 'has-error' : '' }}">
                            <label class="required" for="hotel_name_id">{{ trans('cruds.createVoucher.fields.hotel_name') }}</label>
                            <select class="form-control select2" name="hotel_name_id" id="hotel_name_id" required>
                                @foreach($hotel_names as $id => $entry)
                                <option value="{{ $id }}" {{ old('hotel_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hotel_name'))
                            <span class="help-block" role="alert">{{ $errors->first('hotel_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.hotel_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('room_type') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.createVoucher.fields.room_type') }}</label>
                            <select class="form-control" name="room_type" id="room_type" required>
                                <option value disabled {{ old('room_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\CreateVoucher::ROOM_TYPE_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('room_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('room_type'))
                            <span class="help-block" role="alert">{{ $errors->first('room_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.room_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('number_of_room') ? 'has-error' : '' }}">
                            <label class="required" for="number_of_room">{{ trans('cruds.createVoucher.fields.number_of_room') }}</label>
                            <input class="form-control" type="text" name="number_of_room" id="number_of_room" value="{{ old('number_of_room', '1') }}" required>
                            @if($errors->has('number_of_room'))
                            <span class="help-block" role="alert">{{ $errors->first('number_of_room') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.number_of_room_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('night') ? 'has-error' : '' }}">
                            <label class="required" for="night">{{ trans('cruds.createVoucher.fields.night') }}</label>
                            <input type="text" name="night" id="night" value="{{ old('night', '1') }}" required onfocus="this.blur()">
                            @if($errors->has('night'))
                            <span class="help-block" role="alert">{{ $errors->first('night') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.night_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('room_price') ? 'has-error' : '' }}">
                            <label class="required" for="room_price">{{ trans('cruds.createVoucher.fields.room_price') }}</label>
                            <input class="form-control" type="text" name="room_price" id="room_price" value="{{ old('room_price', '0') }}" required>
                            @if($errors->has('room_price'))
                            <span class="help-block" role="alert">{{ $errors->first('room_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.room_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_amount') ? 'has-error' : '' }}">
                            <label for="total_amount">{{ trans('cruds.createVoucher.fields.total_amount') }}</label>
                            <input class="form-control" type="number" name="total_amount" id="total_amount" value="{{ old('total_amount', '') }}" step="0.01">
                            @if($errors->has('total_amount'))
                            <span class="help-block" role="alert">{{ $errors->first('total_amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.total_amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payment_mode') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.createVoucher.fields.payment_mode') }}</label>
                            <select class="form-control" name="payment_mode" id="payment_mode" required>
                                <option value disabled {{ old('payment_mode', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\CreateVoucher::PAYMENT_MODE_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('payment_mode', 'Cash') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('payment_mode'))
                            <span class="help-block" role="alert">{{ $errors->first('payment_mode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.payment_mode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('observation') ? 'has-error' : '' }}">
                            <label for="observation">{{ trans('cruds.createVoucher.fields.observation') }}</label>
                            <input class="form-control" type="text" name="observation" id="observation" value="{{ old('observation', '') }}">
                            @if($errors->has('observation'))
                            <span class="help-block" role="alert">{{ $errors->first('observation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.observation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
                            <label for="service">{{ trans('cruds.createVoucher.fields.service') }}</label>
                            <input class="form-control" type="text" name="service" id="service" value="{{ old('service', '') }}">
                            @if($errors->has('service'))
                            <span class="help-block" role="alert">{{ $errors->first('service') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.service_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('internal_note') ? 'has-error' : '' }}">
                            <label for="internal_note">{{ trans('cruds.createVoucher.fields.internal_note') }}</label>
                            <input class="form-control" type="text" name="internal_note" id="internal_note" value="{{ old('internal_note', '') }}">
                            @if($errors->has('internal_note'))
                            <span class="help-block" role="alert">{{ $errors->first('internal_note') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createVoucher.fields.internal_note_helper') }}</span>
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
<script src="{{ asset('js/nights.js')}}"></script>
@endsection