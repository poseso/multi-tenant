@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Reiniciar Contraseña'))

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

                        {{ html()->form('POST', route('frontend.auth.password.email.post'))->class('kt-form')->open() }}
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">
                                {{ __('¿Olvidó su contraseña?') }}
                            </h3>

                            <div class="kt-login__desc">
                                {{ __('Escriba su correo para reiniciar su contraseña') }}:
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('Dirección de correo'))
                                        ->attribute('maxlength', 191)
                                        ->autofocus() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                {{ form_cancel(route('frontend.auth.login'), __('Cancelar')) }}
                            </div><!--col-->

                            <div class="col text-right">
                                {{ form_submit(__('Enviar el correo de verificación')) }}
                            </div><!--col-->
                        </div><!--row-->
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
