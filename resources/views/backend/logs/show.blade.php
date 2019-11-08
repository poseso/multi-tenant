@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Eventos') . ' | ' . __('Visualizando Evento'))

@section('breadcrumb-links')
    @include('backend.logs.includes.header-buttons')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_1">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    <strong>{{ __('Visualizando Evento') }}</strong>
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

            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.logs.user.index'), __('Cancelar')) }}
                </div><!--col-->

                <div class="col text-right">
                    <a href="#" class="btn btn-sm btn-info btnSubmit @aclnot(logs.update) disabled @endacl">
                        <i class="fa fa-clipboard"></i>
                        {{ __('Restaurar a este Estado') }}
                    </a>
                </div><!--col-->
            </div><!--row-->
        </div>
    </div>
    <!--end::Portlet-->
@endsection
