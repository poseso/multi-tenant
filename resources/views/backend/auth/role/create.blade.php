@extends('backend.layouts.app')

@section('title', __('Administración de Perfiles') . ' | ' . __('Nuevo Perfil') . ' | ' . app_name())

@section('content')
{{ html()->form('POST', route('admin.auth.role.store'))->class('form-horizontal')->open() }}
<!--begin::Portlet-->
<div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
            </span>

            <h3 class="kt-portlet__head-title">
                {{ __('Administración de Perfiles') }}
                <small class="text-muted">{{ __('Nuevo Perfil') }}</small>
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
                    ->required()
                    ->autofocus() }}
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
                                                        html()->checkbox('permissions[]', old('permissions') && in_array($permission->display_name, old('permissions')) ? true : false, $permission->display_name)
                                                              ->class('checkAll')
                                                              ->id('permission-'.$permission->id)
                                                              . '<span></span>')
                                                              ->for('permission-'.$permission->id) }}
                                                    &nbsp;&nbsp;{{ $permission->display_name }}
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
                {{ form_submit(__('Crear')) }}
            </div><!--col-->
        </div><!--row-->
    </div>
</div>
<!--end::Portlet-->
{{ html()->form()->close() }}
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.checkAll').on('click',function(){
                var type = $(this).attr('id');
                var status = ( $(this).is(':checked') ) ? true : false;

                $.each( $('[name$="['+type+']"]'), function(key,val){
                    var name = $(this).attr('name');
                    $('[name="'+name+'"]').prop('checked', status);
                });
            });
        });
    </script>
@endpush
