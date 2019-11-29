@extends('layouts.app')
@section('content')
<div class="row justify-content-center" style="border: 2px solid #f4b0af; height: 800px;">
{{--    <div class="col-12 text-capitalize text-align-center">--}}
{{--        <center><h1>hello hi how are you</h1></center>--}}
{{--    </div>--}}
    <div class="col-md-6" style="height: 500px;">
        <div class="card mx-4 shadow-lg">

            <div class="card-body p-4 " style="height: 480px; ">
                <h1>Log In</h1>

<hr class="align-baseline mb-8 " style="border-style: none; border: 14px solid #1970C2;line-height: 2;height: 0px; border-width: 1px 0;
  margin: 18px 0;">
                @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form  method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3 mt-xl-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>

                        <input id="email" name="email" type="text" style="height: 60px;" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>

                        <input id="password" name="password" type="password" style="height: 60px;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="input-group mb-4 mt-4">
                        <div class="form-check checkbox">
                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />
                            <label class="form-check-label" for="remember" style="vertical-align: middle;">
                                {{ trans('global.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="row align-items-center m-3">
                        <div class="col-6 m-5" >
                            <button type="submit" class="btn btn-primary btn-lg p-2 btn-block" style="margin-left: 50px; background: #1970C2;">
                                {{ trans('global.login') }}
                            </button>
                        </div>
{{--                        <div class="col-6 text-right">--}}
{{--                            @if(Route::has('password.request'))--}}
{{--                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">--}}
{{--                                    {{ trans('global.forgot_password') }}--}}
{{--                                </a><br>--}}
{{--                            @endif--}}

{{--                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
