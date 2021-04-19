@extends('layouts.auth')

@section('title', 'Forgotten Password')

@section('content')
    <img src="{{asset('assets/demo/default/media/img/logo/INTI-logo-Featured-image.png')}}" style="height: 30%;width: 50%;position: relative;align-self: center"/>

    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--forget-password m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-3.jpg);">
            <div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
                <div class="m-login__container">
                    <div class="m-login__forget-password" style="margin-top: -100px">
                        <div class="m-login__head">
                            <h3 class="m-login__title">
                                {{ __('Forgotten Password ?') }}
                            </h3>
                            <div class="m-login__desc">
                                Enter your email to reset your password:
                            </div>
                        </div>
                        <form class="m-login__form m-form" action="{{ route('password.email') }}" method="POST">
                            @if (session('status'))
                                <div class="m-alert m-alert--outline alert alert-success alert-dismissible animated fadeIn" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                                    <span>{{ session('status') }}</span>
                                </div>
                            @endif

                            @csrf

                            <div class="form-group m-form__group {{ $errors->has('email') ? ' has-danger' : '' }}">
                                <input class="form-control m-input" type="email" placeholder="{{ __('E-Mail Address') }}" name="email" id="m_email" value="{{ old('email') }}" autocomplete="off" required>
                                @if ($errors->has('email'))
                                    <div class="form-control-feedback">{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div class="m-login__form-action">
                                <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
                                    {{ __('Request') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

