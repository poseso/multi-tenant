@extends('backend.layouts.app')

@section('title', __('Administración de Perfiles') . ' | ' . __('Modificar Perfil') . ' | ' . app_name())

@section('content')
    {{ html()->modelForm($role, 'PATCH', route('admin.auth.role.update', $role))->class('form-horizontal')->open() }}
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand kt-menu__link-icon flaticon-lock"></i>
            </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Perfiles') }}
                    <small class="text-muted">{{ __('Modificar Perfil') }}</small>
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

        <div class="kt-portlet__body">
            <div class="kt-portlet__content">
                <div class="row">
                    <label style="font-size: 20px !important;" for="name">{{ __('Nombre del Perfil') }}</label>

                    {{ html()->text('name')
                        ->class('form-control form-control-lg')
                        ->placeholder(__('Escriba un nombre para el Perfil'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                </div>

                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>

                <div class="row">
                    <div class="col-12">
                        <h4>{{ __('Permisos Asociados') }}</h4>

                        <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                    </div>
                </div>

                @if($permissions->count())
                    <div class="row">
                        @foreach ($permissions as $key => $module)
                            <div class="col-xl-2 col-lg-2 col-sm-1">
                                <table class="table-permissions table-borderless">
                                    <thead>
                                    <tr>
                                        <th>
                                            <h4>{{ $key }}</h4>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($module as $permission)
                                        <tr>
                                            <td>
                                                <div class="checkboxes">
                                                    <span class="kt-switch kt-switch--sm kt-switch--icon" style="display: block !important;">
                                                        {{ html()->label(
                                                            html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)
                                                                    ->id('permission-'.$permission->id)
                                                                    . '<span></span>')
                                                                    ->for('permission-'.$permission->id) }}
                                                        {{ $permission->display_name }}
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.role.index'), __('Cancelar')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('Modificar')) }}
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    <!--end::Portlet-->
    {{ html()->closeModelForm() }}
@endsection





{{--@section('content')--}}
{{--{{ html()->modelForm($role, 'PATCH', route('admin.auth.role.update', $role))->class('form-horizontal')->open() }}--}}
{{--    <div class="card">--}}
{{--        <div class="card-body">--}}
{{--            <div class="row">--}}
{{--                <div class="col-sm-5">--}}
{{--                    <h4 class="card-title mb-0">--}}
{{--                        @lang('labels.backend.access.roles.management')--}}
{{--                        <small class="text-muted">@lang('labels.backend.access.roles.edit')</small>--}}
{{--                    </h4>--}}
{{--                </div><!--col-->--}}
{{--            </div><!--row-->--}}
{{--            <!--row-->--}}

{{--            <hr />--}}

{{--            <div class="row mt-4">--}}
{{--                <div class="col">--}}
{{--                    <div class="form-group row">--}}
{{--                        {{ html()->label(__('validation.attributes.backend.access.roles.name'))--}}
{{--                            ->class('col-md-2 form-control-label')--}}
{{--                            ->for('name') }}--}}

{{--                        <div class="col-md-10">--}}
{{--                            {{ html()->text('name')--}}
{{--                                ->class('form-control')--}}
{{--                                ->placeholder(__('validation.attributes.backend.access.roles.name'))--}}
{{--                                ->attribute('maxlength', 191)--}}
{{--                                ->required() }}--}}
{{--                        </div><!--col-->--}}
{{--                    </div><!--form-group-->--}}

{{--                    <div class="form-group row">--}}
{{--                        {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))--}}
{{--                            ->class('col-md-2 form-control-label')--}}
{{--                            ->for('permissions') }}--}}

{{--                        <div class="col-md-10">--}}
{{--                            @if($permissions->count())--}}
{{--                                @foreach($permissions as $permission)--}}
{{--                                    <div class="checkbox d-flex align-items-center">--}}
{{--                                        {{ html()->label(--}}
{{--                                                html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)--}}
{{--                                                        ->class('switch-input')--}}
{{--                                                        ->id('permission-'.$permission->id)--}}
{{--                                                    . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')--}}
{{--                                                ->class('switch switch-label switch-pill switch-primary mr-2')--}}
{{--                                            ->for('permission-'.$permission->id) }}--}}
{{--                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </div><!--col-->--}}
{{--                    </div><!--form-group-->--}}
{{--                </div><!--col-->--}}
{{--            </div><!--row-->--}}
{{--        </div><!--card-body-->--}}

{{--        <div class="card-footer">--}}
{{--            <div class="row">--}}
{{--                <div class="col">--}}
{{--                    {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}--}}
{{--                </div><!--col-->--}}

{{--                <div class="col text-right">--}}
{{--                    {{ form_submit(__('buttons.general.crud.update')) }}--}}
{{--                </div><!--col-->--}}
{{--            </div><!--row-->--}}
{{--        </div><!--card-footer-->--}}
{{--    </div><!--card-->--}}
{{--{{ html()->closeModelForm() }}--}}
{{--@endsection--}}
