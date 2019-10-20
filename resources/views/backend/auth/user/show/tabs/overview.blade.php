<div class="col">
    <div class="table-responsive">
        <table class="table table-hover">
            <tr>
                <th>{{ __('Avatar') }}</th>
                <td><img src="{{ $user->picture }}" class="kt-widget__media" alt="Avatar"/></td>
            </tr>

            <tr>
                <th>{{ __('Nombre') }}</th>
                <td>{{ $user->name }}</td>
            </tr>

            <tr>
                <th>{{ __('Dirección de Correo') }}</th>
                <td>{{ $user->email }}</td>
            </tr>

            <tr>
                <th>{{ __('Estado') }}</th>
                <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
            </tr>

            <tr>
                <th>{{ __('Confirmado') }}</th>
                <td>@include('backend.auth.user.includes.confirm', ['user' => $user])</td>
            </tr>

            <tr>
                <th>{{ __('Zona Horaria') }}</th>
                <td>{{ $user->timezone }}</td>
            </tr>

            <tr>
                <th>{{ __('Último Inicio de Sesión') }}</th>
                <td>
                    @if($user->last_login_at)
                        {{ timezone()->convertToLocal($user->last_login_at) }}
                    @else
                        <span class='badge badge-success bg-light-blue-a300'>{{ __('No Disponible') }}</span>
                    @endif
                </td>
            </tr>

            <tr>
                <th>{{ __('IP Último Inicio de Sesión') }}</th>
                <td>
                    @if ($user->last_login_ip)
                        {{ $user->last_login_ip }}
                    @else
                        <span class='badge badge-success bg-light-blue-a300'>{{ __('No Disponible') }}</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>
</div>
