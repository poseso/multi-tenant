@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Registrarse'))

@section('content')
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v3 kt-login--signin" id="kt_login">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('assets/media/bg/bg-3.jpg') }}); background-size: cover;">
                @include('includes.partials.read-only')
                @include('includes.partials.messages')
                <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                    <div class="messages"></div>
                    <div class="kt-login__container">
                        <div class="kt-login__logo">
                            <a href="#">
                                <img src="{{ asset('assets/media/logos/contasoft-black.svg') }}" alt="Logo Contasoft">
                            </a>
                        </div>

                        {{ html()->form('POST', route('frontend.auth.register.post'))->class('kt-form')->open() }}
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">
                                {{ __('Registro de Cuenta') }}
                            </h3>
                            <div class="kt-login__desc">
                                {{ __('Escriba sus detalles para crear su cuenta') }}:
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__('Nombre'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--col-->
                            </div><!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__('Apellidos'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->text('username')
                                        ->class('form-control')
                                        ->placeholder(__('Usuario'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('Dirección de correo'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('Contraseña')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('Confirmación de la Contraseña')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if(config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                {{ form_cancel(route('frontend.auth.login'), __('Cancelar')) }}
                            </div><!--col-->

                            <div class="col text-right">
                                {{ form_submit(__('Registrarse')) }}
                            </div><!--col-->
                        </div><!--row-->
                        {{ html()->form()->close() }}

                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    @include('frontend.auth.includes.socialite')
                                </div>
                            </div><!--/ .col -->
                        </div><!-- / .row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        @captchaScripts
    @endif
@endpush
