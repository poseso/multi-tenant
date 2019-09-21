<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn">
    <i class="la la-close"></i>
</button>

<div class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="?page=index">
                <img width="200" alt="Logo" src="{{ asset('assets/media/logos/contasoft.svg') }}">
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler">
                <span></span>
            </button>
        </div>
    </div>
    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    @include('backend.includes.sidebar')
    <!-- end:: Aside Menu -->
</div>
<!-- end:: Aside -->
