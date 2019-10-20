@if ($user->providers->count())
    @foreach ($user->providers as $social)
        <a href="{{ route( 'admin.auth.user.social.unlink', [$user, $social]) }}" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="{{ __('Desconectar') }}" data-method="delete">
            <i class="fab fa-{{ $social->provider }}"></i>
        </a>
    @endforeach
@else
    <span class='badge badge-success bg-red-600'>{{ __('Ningúno') }}</span>
@endif
