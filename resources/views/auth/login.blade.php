@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    <img src="{{asset('assets/demo/default/media/img/logo/INTI-logo-Featured-image.png')}}" style="height: 30%;width: 50%;position: relative;align-self: center"/>

    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
            <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__signin" style="margin-top: -100px">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                {{ __('Login') }}
                            </h3>
                        </div>

                        <form class="m-login__form m-form" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group m-form__group {{ $errors->has('email') ? 'has-danger' : '' }}">
                                <input class="form-control m-input"   type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" autocomplete="off">

                                @if ($errors->has('email'))
                                    <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="form-group m-form__group {{ $errors->has('password') ? 'has-danger' : '' }}">
                                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="{{ __('Password') }}" name="password">

                                @if ($errors->has('password'))
                                    <div class="form-control-feedback">{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="row m-login__form-sub">
                                <div class="col m--align-left m-login__form-left">
                                    <label class="m-checkbox  m-checkbox--focus">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        {{ __('Remember Me') }}
                                        <span></span>
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col m--align-right m-login__form-right">
                                        <a href="{{ route('password.request') }}" id="m_login_forget_password" class="m-link">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="m-login__form-action">
                                <button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


