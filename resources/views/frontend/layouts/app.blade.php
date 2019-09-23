<!DOCTYPE html>
<!--
Producto: Sistema Integrado de Gestión Contable
Autor: Carlos Sánchez
Website: http://www.modocreativo.net/
Contacto: carlos@modocreativo.net
-->
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
<head>
    <!-- ======================================================================================================================================
    TITLE
    ======================================================================================================================================= -->
    <title>@yield('title', app_name())</title>
    <!-- ======================================================================================================================================
    BASIC META TAGS
    ======================================================================================================================================= -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="Accounting, Finance, Factura, Quotes, Facturacion, Contabilidad, Contable"/>
    <meta name="copyright" content="Modo Creativo S.R.L.">
    <meta name="language" content="spanish">
    <meta name="robots" content="index,follow" />
    <meta name="revised" content="Sabado, 04 de mayo, 2019, 09:57 am" />
    <meta name="topic" content="Sistema de Gestión Contable - Contasoft">
    <meta name="Classification" content="Accounting">
    <meta name="description" content="@yield('meta_description', 'Sistema Integrado de Gestión Contable')">
    <meta name="author" content="@yield('meta_author', 'Carlos Sánchez')">
    <meta name="owner" content="Modo Creativo S.R.L.">
    <meta name="url" content="http://www.modocreativo.net">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">
    <meta name="googlebot" content="index follow noodp" />
    <!-- ======================================================================================================================================
    APPLE META TAGS
    ======================================================================================================================================= -->
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
    <meta name="og:title" content="Sistema Integrado de Gestión Contable"/>
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
    <!-- ======================================================================================================================================
    MICROSOFT CLEAR TYPE RENDERING
    ======================================================================================================================================= -->
    <!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Fonts -->

    @yield('meta')

    {{-- See https://laravel.com/docs/5.8/blade#stacks for usage --}}
    @stack('before-styles')
    {{ style(mix('fonts/fonts.css')) }}

    <!--begin::Global Theme Styles(used by all pages) -->
    {{ style(mix('css/frontend.css')) }}
    <!--end::Global Theme Styles -->

    @stack('after-styles')
    {{ style('assets/vendors/custom/custom.css') }}
</head>

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    @yield('content')
    <!-- end:: Page -->

    @stack('before-scripts')
    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        let KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script('assets/vendors/global/vendors.bundle.js') !!}
    {!! script('assets/js/demo1/scripts.bundle.js') !!}
    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    {!! script('assets/vendors/custom/custom.js') !!}

    @stack('after-scripts')

    <script>
        $(document).ready(function () {
            $('div.alert').not('.alert-solid-danger, .alert-solid-warning, .alert-solid-info, .alert-danger, .alert-info, .alert-warning').delay(6000).slideUp(500);
        });
    </script>
    <!--end::Page Scripts -->
</body>
<!-- end::Body -->
</html>
