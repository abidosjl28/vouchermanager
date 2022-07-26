@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">
            {{ trans('global.login') }}
        </p>

        @if(session('message'))
        <p class="alert alert-info">
            {{ session('message') }}
        </p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <input id="name" type="name" name="name" class="form-control" required autocomplete="name" autofocus placeholder="User{{ trans('global.user_name') }}" value="{{ old('name', null) }}">

                @if($errors->has('name'))
                <p class="help-block">
                    {{ $errors->first('name') }}
                </p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input id="password" type="password" name="password" class="form-control" required placeholder="{{ trans('global.login_password') }}">

                @if($errors->has('password'))
                <p class="help-block">
                    {{ $errors->first('password') }}
                </p>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label><input type="checkbox" name="remember"> {{ trans('global.remember_me') }}</label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ trans('global.login') }}
                    </button>
                </div>
            </div>
        </form>

        @if(Route::has('password.request'))
        <a href="{{ route('password.request') }}">
            {{ trans('global.forgot_password') }}
        </a><br>
        @endif


    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
@endsection