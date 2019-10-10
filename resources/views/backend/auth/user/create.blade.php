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
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Apellidos'))->class('col-md-2 form-control-label')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('Apellidos'))
                                ->attribute('maxlength', 70) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Usuario'))->class('col-md-2 form-control-label')->for('username') }}

                        <div class="col-md-10">
                            {{ html()->text('username')
                                ->class('form-control')
                                ->placeholder(__('Usuario'))
                                ->attribute('maxlength', 25) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Dirección de correo'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('Dirección de correo'))
                                ->attribute('maxlength', 65) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Contraseña'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder(__('Contraseña')) }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Confirmación de la contraseña'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                        <div class="col-md-10">
                            {{ html()->password('password_confirmation')
                                ->class('form-control')
                                ->placeholder(__('Confirmación de la contraseña')) }}
                        </div><!--col-->
                    </div><!--form-group-->

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
                    </div><!--form-group-->

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
                    </div><!--form-group-->

                    @if(! config('access.users.requires_approval'))
                        <div class="form-group row">
                            {{ html()->label(__('Enviar Correo de Confirmación') . '<br/>' . '<small>' .  __('Si la confirmación está desactivada') . '</small>')->class('col-md-2')->for('confirmation_email') }}

                            <div class="col-md-10">
                                <span class="kt-switch kt-switch--sm kt-switch--icon">
                                    <label>
                                        {{ html()->checkbox('confirmation_email') }}
                                        <span></span>
                                    </label>
                                </span>
                            </div>
                        </div><!--form-group-->
                    @endif

                    <div class="form-group row">
                        {{ html()->label(__('Abilidades'))->class('col-md-2 form-control-label') }}

                        <div class="col-md-10">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Perfiles') }}</th>
                                        <th>{{ __('Permisos') }}</th>
                                    </tr>
                                    </thead>
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
                                                                &nbsp;&nbsp;{{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            @if($role->id != 1)
                                                                @if($role->permissions->count())
                                                                    @foreach($role->permissions as $permission)
                                                                        <i class="fas fa-dot-circle"></i> {{ ucwords($permission->display_name) }}
                                                                    @endforeach
                                                                @else
                                                                    {{ __('Ningúno') }}
                                                                @endif
                                                            @else
                                                                {{ __('Todos los permisos') }}
                                                            @endif
                                                        </div>
                                                    </div><!--card-->
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($permissions->count())
                                                @foreach($permissions as $permission)
                                                    <div class="checkbox d-flex align-items-center">
                                                        {{ html()->label(
                                                                html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
                                                                      ->class('switch-input')
                                                                      ->id('permission-'.$permission->id)
                                                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                ->class('switch switch-label switch-pill switch-primary mr-2')
                                                            ->for('permission-'.$permission->id) }}
                                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!--col-->
                    </div><!--form-group-->

                    {{--<div class="form-group row {{ $errors->has('profile') ? ' has-danger' : '' }}">--}}
                        {{--{{ html()->label(__('Perfil de Seguridad'))->class('col-md-2 mt-3')->for('profile') }}--}}

                        {{--<div class="col-md-10">--}}
                            {{--<select name="profile" id="profile" class="form-control select2" data-placeholder="{{ __('Seleccione Perfil de Seguridad...') }}">--}}
                                {{--<option value=""></option>--}}
                                {{--@foreach($profiles as $profile)--}}
                                    {{--@if(old('profile') == $profile->id)--}}
                                        {{--<option value="{{ $profile->id }}" selected>{{ $profile->description }}</option>--}}
                                    {{--@else--}}
                                        {{--<option value="{{ $profile->id }}">{{ $profile->description }}</option>--}}
                                    {{--@endif--}}
                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{--@if ($errors->has('profile'))--}}
                                {{--<span class="form-text text-danger">--}}
                                    {{--{{ $errors->first('profile') }}--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div><!--col-->
            </div><!--row-->
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('Cancelar')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('Crear')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Portlet-->
    {{ html()->form()->close() }}
@endsection
