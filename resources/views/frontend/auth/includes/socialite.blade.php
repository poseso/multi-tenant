@if (config('services.bitbucket.active'))
    <a href='{{ route('frontend.auth.social.login', 'bitbucket') }}' class='btn btn-sm btn-outline-info m-1'>
        <i class='fab fa-bitbucket'></i>
        {{ __('Iniciar sesión con :social_media', ['social_media' => 'BitBucket']) }}
    </a>
@endif

@if (config('services.facebook.active'))
    <a href='{{ route('frontend.auth.social.login', 'facebook') }}' class='btn btn-sm btn-outline-info m-1'>
        <i class='fab fa-facebook'></i>
        {{ __('Iniciar sesión con :social_media', ['social_media' => 'Facebook']) }}
    </a>
@endif

@if (config('services.google.active'))
    <a href='{{ route('frontend.auth.social.login', 'google') }}' class='btn btn-sm btn-outline-info m-1'>
        <i class='fab fa-google'></i>
        {{ __('Iniciar sesión con :social_media', ['social_media' => 'Google']) }}
    </a>
@endif

@if (config('services.github.active'))
    <a href='{{ route('frontend.auth.social.login', 'github') }}' class='btn btn-sm btn-outline-info m-1'>
        <i class='fab fa-github'></i>
        {{ __('Iniciar sesión con :social_media', ['social_media' => 'Github']) }}
    </a>
@endif

@if (config('services.linkedin.active'))
    <a href='{{ route('frontend.auth.social.login', 'linkedin') }}' class='btn btn-sm btn-outline-info m-1'>
        <i class='fab fa-linkedin'></i>
        {{ __('Iniciar sesión con :social_media', ['social_media' => 'LinkedIn']) }}
    </a>
@endif

@if (config('services.twitter.active'))
    <a href='{{ route('frontend.auth.social.login', 'twitter') }}' class='btn btn-sm btn-outline-info m-1'>
        <i class='fab fa-twitter'></i>
        {{ __('Iniciar sesión con :social_media', ['social_media' => 'Twitter']) }}
    </a>
@endif
