@extends('backend.layouts.app')

@section('title', __('Administración de Usuarios') . ' | ' . __('Nuevo Usuario') . ' | ' . app_name())

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.user.store'))->class('form-horizontal')->open() }}
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Usuarios') }}
                    <small class="text-muted">{{ __('Nuevo Usuario') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-group">
                    <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md">
                        <i class="la la-angle-down"></i>
                    </a>
                </div>
            </div>
        </div>

        <!--begin::Content-->
        <div class="kt-portlet__body">
            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('Nombre'))->class('col-md-2 form-control-label')->for('first_name') }}

                        <div class="col-md-10">
                            {{ html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('Nombre'))
                                ->attribute('maxlength', 70)
                                ->autofocus() }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Apellidos'))->class('col-md-2 form-control-label')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('Apellidos'))
                                ->attribute('maxlength', 70) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Usuario'))->class('col-md-2 form-control-label')->for('username') }}

                        <div class="col-md-10">
                            {{ html()->text('username')
                                ->class('form-control')
                                ->placeholder(__('Usuario'))
                                ->attribute('maxlength', 25) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Dirección de correo'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('Dirección de correo'))
                                ->attribute('maxlength', 65) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Contraseña'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('Contraseña')) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Confirmación de la contraseña'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                        <div class="col-md-10">
                            {{ html()->password('password_confirmation')
                                ->class('form-control')
                                ->placeholder(__('Confirmación de la contraseña')) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Activo'))->class('col-md-2 form-control-label')->for('active') }}

                        <div class="col-md-10">
                            <span class="kt-switch kt-switch--sm kt-switch--icon">
                                <label>
                                    {{ html()->checkbox('active', true) }}
                                    <span data-checked="yes" data-unchecked="no"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ html()->label(__('Confirmado'))->class('col-md-2 form-control-label')->for('confirmed') }}

                        <div class="col-md-10">
                            <span class="kt-switch kt-switch--sm kt-switch--icon">
                                <label>
                                    {{ html()->checkbox('confirmed', true) }}
                                    <span data-checked="yes" data-unchecked="no"></span>
                                </label>
                            </span>
                        </div>
                    </div>

                    @if(! config('access.users.requires_approval'))
                        <div class="form-group row">
                            {{ html()->label(__('Enviar Correo de Confirmación') . '<br/>' . '<small>' .  __('Si la confirmación está desactivada') . '</small>')
                                ->class('col-md-2')->for('confirmation_email') }}

                            <div class="col-md-10">
                                <span class="kt-switch kt-switch--sm kt-switch--icon">
                                    <label>
                                        {{ html()->checkbox('confirmation_email') }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row">
                        <div class="col-xl-6 col-sm-12">
                            <h3 class="kt-portlet__head-title">{{ __('Perfiles') }}</h3>
                            <div class="table-responsive">
                                <table class="table-permissions">
                                    <tbody>
                                    <tr>
                                        <td>
                                            @if($roles->count())
                                                @foreach($roles as $role)
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="checkbox d-flex align-items-center">
                                                                <span class="kt-switch kt-switch--sm kt-switch--icon">
                                                                    <label>
                                                                    {{ html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                        ->id('role-'.$role->id) }}
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                                &nbsp;&nbsp;
                                                                {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            @if($role->id != 1)
                                                                @if($role->permissions->count())
                                                                    @foreach($role->permissions as $permission)
                                                                        <label class="kt-checkbox kt-checkbox--bold">
                                                                            <input type="checkbox" checked="checked" disabled>
                                                                            {{ ucwords($permission->display_name) }} &nbsp;
                                                                            <span></span>
                                                                        </label>
                                                                    @endforeach
                                                                @else
                                                                    {{ __('Ningúno') }}
                                                                @endif
                                                            @else
                                                                {{ __('Todos los permisos') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <h3 class="kt-portlet__head-title">{{ __('Permisos') }}</h3>
                            <div class="table-responsive">
                                <table class="table-permissions">
                                    <tbody>
                                    <tr>
                                        <td>
                                            @if($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkboxes">
                                                        <span class="kt-switch kt-switch--sm kt-switch--icon" style="display: block !important;">
                                                            {{ html()->label(
                                                                html()->checkbox('permissions[]', old('permissions') && in_array($permission->display_name, old('permissions')) ? true : false, $permission->display_name)
                                                                      ->class('checkAll')
                                                                      ->id('permission-'.$permission->id)
                                                                      . '<span></span>')
                                                                      ->for('permission-'.$permission->id) }}
                                                            &nbsp;&nbsp;
                                                            {{ $permission->display_name }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('Cancelar')) }}
                </div>

                <div class="col text-right">
                    {{ form_submit(__('Crear')) }}
                </div>
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Portlet-->
    {{ html()->form()->close() }}
@endsection
