@if ($user->trashed())
    <div class="dropdown">
        <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
            <i class="flaticon-more-1"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('admin.auth.user.restore', $user) }}" name="confirm_item" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="@lang('buttons.backend.access.users.restore_user')">
                <i class="fas fa-sync"></i>
            </a>

            <a href="{{ route('admin.auth.user.delete-permanently', $user) }}" name="confirm_item" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="@lang('buttons.backend.access.users.delete_permanently')">
                <i class="fas fa-trash"></i>
            </a>
        </div>
    </div>
@else
    <div class="dropdown">
        <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
            <i class="flaticon-more-1"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('admin.auth.user.show', $user) }}" class="dropdown-item">
                {{ __('Visualizar') }}
            </a>

            <a href="{{ route('admin.auth.user.edit', $user) }}" class="dropdown-item">
                {{ __('Modificar') }}
            </a>

            @if ($user->id !== auth()->id())
                <a href="{{ route('admin.auth.user.clear-session', $user) }}"
                   data-trans-button-cancel="@lang('buttons.general.cancel')"
                   data-trans-button-confirm="@lang('buttons.general.continue')"
                   data-trans-title="@lang('strings.backend.general.are_you_sure')"
                   class="dropdown-item" name="confirm_item">@lang('buttons.backend.access.users.clear_session')</a>
            @endif

            @canBeImpersonated($user)
            <a href="{{ route('impersonate', $user->id) }}" class="dropdown-item">@lang('buttons.backend.access.users.login_as', ['user' => $user->full_name])</a>
            @endCanBeImpersonated

            <a href="{{ route('admin.auth.user.change-password', $user) }}" class="dropdown-item">@lang('buttons.backend.access.users.change_password')</a>

            @if ($user->id !== auth()->id())
                @switch($user->active)
                    @case(0)
                    <a href="{{ route('admin.auth.user.mark', [$user, 1,]) }}" class="dropdown-item">@lang('buttons.backend.access.users.activate')</a>
                    @break

                    @case(1)
                    <a href="{{ route('admin.auth.user.mark', [$user, 0]) }}" class="dropdown-item">@lang('buttons.backend.access.users.deactivate')</a>
                    @break
                @endswitch
            @endif

            @if (! $user->isConfirmed() && ! config('access.users.requires_approval'))
                <a href="{{ route('admin.auth.user.account.confirm.resend', $user) }}" class="dropdown-item">@lang('buttons.backend.access.users.resend_email')</a>
            @endif

            @if ($user->id !== 1 && $user->id !== auth()->id())
                <a href="{{ route('admin.auth.user.destroy', $user) }}"
                   data-method="delete"
                   data-trans-button-cancel="@lang('buttons.general.cancel')"
                   data-trans-button-confirm="@lang('buttons.general.crud.delete')"
                   data-trans-title="@lang('strings.backend.general.are_you_sure')"
                   class="dropdown-item">@lang('buttons.general.crud.delete')</a>
            @endif
        </div>
    </div>
@endif
