@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Contacto'))

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

                        {{ html()->form('POST', route('frontend.contact.send'))->class('kt-form')->open() }}
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">
                                {{ __('Contactenos') }}
                            </h3>
                            <div class="kt-login__desc">
                                {{ __('Para ponerse en contacto, favor llenar el formulario.') }}:
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('Nombre Completo'))->for('name') }}

                                    {{ html()->text('name', optional(auth()->user())->name)
                                        ->class('form-control')
                                        ->placeholder(__('Nombre Completo'))
                                        ->attribute('maxlength', 191)
                                        ->autofocus() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('Dirección de Correo'))->for('email') }}

                                    {{ html()->email('email', optional(auth()->user())->email)
                                        ->class('form-control')
                                        ->placeholder(__('Dirección de Correo'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('Teléfono'))->for('phone') }}

                                    {{ html()->text('phone')
                                        ->class('form-control')
                                        ->placeholder(__('Teléfono'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('Mensaje'))->for('message') }}

                                    {{ html()->textarea('message')
                                        ->class('form-control')
                                        ->placeholder(__('Mensaje'))
                                        ->attribute('rows', 3) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if(config('access.captcha.contact'))
                            <div class="row">
                                <div class="col">
                                    @captcha
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group text-left">

                                    {{ form_cancel(route('frontend.auth.login'), __('Cancelar')) }}
                                </div>
                            </div><!--col-->

                            <div class="col">
                                <div class="form-group mb-0 text-right">
                                    {{ form_submit(__('Enviar')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif
@endpush
