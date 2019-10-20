@extends('backend.layouts.app')

@section('title', __('Administración de Usuarios') . ' | ' . __('Visualizando Usuario') . ' | ' . app_name())

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Usuarios') }}
                    <small class="text-muted">
                        {{ __('Visualizando Usuario') }} ({{ $user->fullname }})
                    </small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-right" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#resumen" role="tab">
                            <i class="flaticon-user"></i>
                            {{ __('Resúmen') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="resumen" role="tabpanel">
                    @include('backend.auth.user.show.tabs.overview')
                </div>
            </div>
        </div>

        <div style="background-color: whitesmoke;" class="kt-portlet__foot">
            <div class="row">
                <div class="col">
                    <small class="float-right text-muted">
                        <strong>{{ __('Creación') }}:</strong> {{ timezone()->convertToLocal($user->created_at) }} ({{ $user->created_at->diffForHumans() }}),
                        <strong>{{ __('Última Actualización') }}:</strong> {{ timezone()->convertToLocal($user->updated_at) }} ({{ $user->updated_at->diffForHumans() }})
                        @if($user->trashed())
                            <strong>{{ __('Eliminación') }}:</strong> {{ timezone()->convertToLocal($user->deleted_at) }} ({{ $user->deleted_at->diffForHumans() }})
                        @endif
                    </small>
                </div>
            </div><!--row-->
        </div>
    </div>
    <!--end::Portlet-->
@endsection
