<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- ======================================================================================================================================
    TITLE
    ======================================================================================================================================= -->
    <title>@yield('title', app_name() . ' | ' . 'Error 404')</title>
    <!-- ======================================================================================================================================
    BASIC META TAGS
    ======================================================================================================================================= -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Accounting, Finance, Factura, Quotes, Facturacion, Contabilidad, Contable"/>
    <meta name="description" content="Sistema de Gestión Contable que le facilitara su contabilidad diaria."/>
    <meta name="copyright" content="Black Lyon Technologies S.R.L.">
    <meta name="language" content="spanish">
    <meta name="robots" content="index,follow" />
    <meta name="revised" content="Martes, 20 de mayo, 2019, 10:50 pm" />
    <meta name="topic" content="Sistema de Gestión Contable - Contasoft">
    <meta name="Classification" content="Accounting">
    <meta name="author" content="Carlos Sanchez, c.sanchez@blacklyontech.com">
    <meta name="owner" content="Black Lyon Technologies S.R.L.">
    <meta name="url" content="http://www.blacklyontech.com">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="googlebot" content="index follow noodp" />
    <!-- ======================================================================================================================================
    APPLE META TAGS
    ======================================================================================================================================= -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <!-- ======================================================================================================================================
    FAVICON
    ======================================================================================================================================= -->
    <link rel="shortcut icon" type="assets/ico" href="{{ asset('assets/ico/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/ico/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/ico/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/ico/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/ico/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/ico/manifest.json') }}">
    <!-- ======================================================================================================================================
    OPENGRAPH META TAGS
    ======================================================================================================================================= -->
    <meta name="og:country-name" content="DO"/>
    <meta name="og:title" content="Sistema de Gestion Contable"/>
    <meta name="og:type" content="Accounting"/>
    <meta name="og:url" content="http://www.contasoft.com.do"/>
    <meta name="og:image" content="http://www.contasoft.com.do/logo.png"/>
    <meta name="og:site_name" content="Contasoft"/>
    <meta name="og:description" content="Sistema de Facturacion en Linea"/>
    <meta name="fb:page_id" content="123456789012" />
    <meta name="og:email" content="info@contasoft.com.do"/>
    <!-- ======================================================================================================================================
    PARA PANTALLAS CON RETINA Y APPLE / iOS WEB APPS / iPHONES
    ======================================================================================================================================= -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/ico/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/ico/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/ico/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/ico/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/ico/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/ico/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/ico/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/ico/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/ico/apple-icon-180x180.png') }}">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- ======================================================================================================================================
    MICROSOFT CLEAR TYPE RENDERING
    ======================================================================================================================================= -->
    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->
    <!-- ======================================================================================================================================
    BEFORE STYLES
    ======================================================================================================================================= -->
{{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
@stack('before-styles')
<!-- Libs CSS -->
    <link type="text/css" media="all" href="{{ asset('errors/bear/assets/boostrap-files/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="{{ asset('errors/bear/assets/css/style.css') }}" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="{{ asset('errors/bear/assets/css/respons.css') }}" rel="stylesheet" />

    <!-- ======================================================================================================================================
    AFTER STYLES
    ======================================================================================================================================= -->
    @stack('after-styles')

</head>

<body>

<!-- Load page -->
<div class="animationload">
    <div class="loader">
    </div>
</div>
<!-- End load page -->

<!-- Content Wrapper -->
<div id="wrapper">
    <div class="container">
        <!-- Info -->
        <div class="info">
            <h1>{{ __('Error 500') }}</h1>
            <h2>{{ __('Error Interno del Servidor!') }}</h2>
            <p>{{ __('El servidor encontró una condición inesperada que') }} <br>{{ __('le impidió completar la solicitud.') }}</p>
            <a href="{{ url()->previous() }}" class="btn">{{ __('Regresar') }}</a>
        </div>
        <!-- end Info -->

        <!-- Bear -->
        <div class="bear">
            <div class="zzz"></div>
        </div>
        <!-- end Bear -->
    </div>
    <!-- end container -->
</div>
<!-- end Content Wrapper -->
<div class="d-flex justify-content-center">
    <footer>
    <span class="pull-left">
        <strong>{{ __('Copyright') }} &copy; {{ date('Y') }}
            <a href="http://boilerplate.com">{{ app_name() }}. </a>
        </strong>
        {{ __('Todos los derechos reservados.') }}
    </span>

        <span class="ml-auto">
        {{ __('By') }}
            <a href="http://www.modocreativo.net">
            {{ __('Modo Creativo') }}
        </a>
    </span>
    </footer>
</div>

<!-- ======================================================================================================================================
BEFORE SCRIPTS
======================================================================================================================================= -->
@stack('before-scripts')
<!-- ======================================================================================================================================
CORE
======================================================================================================================================= -->
<!-- Scripts -->
<script src="{{ asset('errors/bear/assets/js/jquery-3.4.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('errors/bear/assets/boostrap-files/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('errors/bear/assets/js/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('errors/bear/assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- ======================================================================================================================================
AFTER SCRIPTS
======================================================================================================================================= -->
@stack('after-scripts')
@include('includes.partials.ga')
</body>

</html>