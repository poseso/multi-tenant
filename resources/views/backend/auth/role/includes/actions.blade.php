@if ($role->id !== 1)
    <div class="dropdown">
        <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
            <i class="flaticon-more-1"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-right">
            <a href="{{ route('admin.auth.role.edit', $role) }}" class="dropdown-item">
                {{ __('Modificar') }}
            </a>

            <a href="{{ route('admin.auth.role.destroy', $role) }}"
               data-method="delete"
               data-trans-button-cancel="{{ __('Cancelar') }}"
               data-trans-button-confirm="{{ __('Eliminar') }}"
               data-trans-title="{{ __('¿Está seguro?') }}"
               class="dropdown-item">{{ __('Eliminar') }}
            </a>
        </div>
    </div>
@else
    <span class="badge badge-success bg-light-blue-a300">
        {{ __('No Disponible') }}
    </span>
@endif
