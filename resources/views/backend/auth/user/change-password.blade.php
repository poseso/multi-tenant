@extends('backend.layouts.app')

@section('title', __('Administración de Usuarios') . ' | ' . __('Cambiar la contraseña'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('PATCH', route('admin.auth.user.change-password.post', $user))->class('form-horizontal')->open() }}
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Usuarios') }}
                    <small class="text-muted">
                        {{ __('Cambiar la contraseña para') }}:
                        <strong>({{ $user->name }})</strong>
                    </small>
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
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('Administración de usuarios') }}
                        <small class="text-muted">
                            {{ __('Cambiar la contraseña para') }}:
                            <strong>({{ $user->name }})</strong>
                        </small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('Contraseña'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder( __('Contraseña'))
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('Confirmación de la Contraseña'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                        <div class="col-md-10">
                            {{ html()->password('password_confirmation')
                                ->class('form-control')
                                ->placeholder( __('Confirmación de la Contraseña')) }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.user.index'), __('Cancelar')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('Modificar')) }}
                </div><!--row-->
            </div><!--row-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Portlet-->
    {{ html()->form()->close() }}
@endsection
