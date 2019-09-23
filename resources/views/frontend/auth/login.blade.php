@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Iniciar Sesión'))

@section('content')

    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }}); background-size: cover;">
                @include('includes.partials.read-only')
                @include('includes.partials.messages')
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="messages"></div>
                    <div class="kt-login__container">
                        <div class="kt-login__logo" style="margin: 0 0 25px 0;">
                            <a href="#">
                                <img src="{{ asset('assets/media/logos/contasoft-black.svg') }}" alt="Logo Contasoft">
                            </a>
                        </div>

                        {{ html()->form('POST', route('frontend.auth.login.post'))->class('kt-form')->open() }}
                        <div class="kt-login__signin">
                            <div class="input-group">
                                {{ html()->text('email')
                                    ->class('form-control')
                                    ->placeholder(__('Usuario o Correo Electrónico'))
                                    ->attribute('maxlength', 191)
                                    ->autofocus() }}
                            </div>

                            <div class="input-group">
                                {{ html()->password('password')
                                    ->class('form-control')
                                    ->placeholder(__('Contraseña')) }}
                            </div>

                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox" for="remember">
                                        <input type="checkbox" name="remember" id="remember" value="1" checked="">
                                        {{ __('Recordarme') }}
                                        <span></span>
                                    </label>
                                </div>

                                <div class="col kt-align-right">
                                    <a href="{{ route('frontend.auth.password.email') }}" class="kt-login__link">
                                        {{__ ('¿Ha olvidado su contraseña?') }}
                                    </a>
                                </div>
                            </div>

                            <div class="kt-login__actions">
                                <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">
                                    {{ __('Iniciar Sesión') }}
                                </button>
                            </div>

                            @if(config('access.captcha.login'))
                                <div class="row">
                                    <div class="col">
                                        @captcha
                                        {{ html()->hidden('captcha_status', 'true') }}
                                    </div><!--col-->
                                </div><!--row-->
                            @endif
                        </div>
                        {{ html()->form()->close() }}

                        <div class="kt-login__account">
                            <span class="kt-login__account-msg">
                                {{ __('Aún no tiene Cuenta?') }}
                            </span>
                            &nbsp;&nbsp;
                            <a href="{{ route('frontend.auth.register') }}" class="kt-login__account-link">
                                {{ __('Registrarse') }}
                            </a>
                        </div>

                        <div class="kt-login__account">
                            <a href="{{ route('frontend.contact') }}" class="kt-login__account-link">
                                {{ __('Contactenos') }}
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                @include('frontend.auth.includes.socialite')
                            </div>
                        </div><!--col-->
                    </div><!--row-->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.login'))
        @captchaScripts
    @endif
@endpush
