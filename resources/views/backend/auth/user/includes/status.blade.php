@if($user->isActive())
    <span class='badge badge-success bg-green-500'>
        {{ __('Activo') }}
    </span>
@else
    <span class='badge badge-danger bg-red-900'>
        {{ __('Inactivo') }}
    </span>
@endif
