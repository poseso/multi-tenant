@if ($user->isConfirmed())
    @if ($user->id !== 1 && $user->id !== auth()->id())
        <a href="{{ route( 'admin.auth.user.unconfirm', $user) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Deshacer') }}" name="confirm_item">
            <span class="badge badge-success bg-green-500" style="cursor:pointer">{{ __('Si') }}</span>
        </a>
    @else
        <span class="badge badge-success bg-green-500">{{ __('Si') }}</span>
    @endif
@else
    <a href="{{ route('admin.auth.user.confirm', $user) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Confirmar') }}" name="confirm_item">
        <span class="badge badge-danger bg-red-500" style="cursor:pointer">{{ __('No') }}</span>
    </a>
@endif
