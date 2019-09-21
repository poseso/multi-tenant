<!-- begin:: Footer -->
<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
    <div class="kt-footer__copyright">
        {{ __('Copyright') }} &copy; {{ date('Y') }}
        <a href="http://modocreativo.net" target="_blank" class="kt-link">
            &nbsp;Modo Creativo
        </a>
    </div>

    <div class="kt-footer__menu">
        <a href="http://modocreativo.net" target="_blank" class="kt-footer__menu-link kt-link">
            About
        </a>

        <a href="http://modocreativo.net" target="_blank" class="kt-footer__menu-link kt-link">
            Team
        </a>

        <a href="{{ route('frontend.contact') }}" target="_blank" class="kt-footer__menu-link kt-link">
            {{ __('Contacto') }}
        </a>
    </div>
</div>
<!-- end:: Footer -->
