@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Usuarios'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Usuarios') }} <small class="text-muted">{{ __('Usuarios Activos') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <span class="d-none d-lg-inline" id="ExportButtons"></span>
                        @include('backend.auth.user.includes.header-buttons')
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table id="tabla-usuarios" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Apellidos') }}</th>
                    <th>{{ __('Usuario') }}</th>
                    <th>{{ __('Dirección de Correo') }}</th>
                    <th>{{ __('Confirmado') }}</th>
                    <th>{{ __('Cuenta Social') }}</th>
                    <th>{{ __('Perfiles') }}</th>
                    <th>{{ __('Otros Permisos') }}</th>
                    <th>{{ __('Última Modificación') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
                </thead>

                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tfoot>
            </table>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function() {
            let table = $('#tabla-usuarios').DataTable({
                dom: "<'row mt-4'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.auth.user.get") }}',
                    type: 'get',
                    data: {status: 1, trashed: false},
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'first_name', name: 'first_name'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'username', name: 'username'},
                    {data: 'email', name: 'email'},
                    {data: 'confirmed', name: 'confirmed', className: 'text-center'},
                    {data: 'social', name: 'social'},
                    {data: 'roles', name: 'roles'},
                    {data: 'permissions', name: 'permissions'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false, className: 'text-center'}
                ],
                select: true,
                responsive: true,

                initComplete: function () {
                    this.api().columns([0]).every(function () {
                        let column = this;
                        let header = $('#tabla-usuarios').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search( val ? '^'+val+'$' : '', true, false ).draw();
                            });
                    });

                    this.api().columns([0, 1, 2, 3, 4]).every(function () {
                        let column = this;
                        let header = $('#tabla-usuarios').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? val : '', true, false).draw();
                            });

                    });

                },
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, '{{ __('Todos') }}']],
                columnDefs: [ {
                    targets: [9],
                    orderable: false,
                    searchable: false
                } ],
                aaSorting: [[ 0, 'asc' ]],
                language: {
                    select: {
                        rows: {
                            _: "%d filas seleccionadas",
                            0: "Haga clic en una fila para seleccionarla",
                            1: "1 fila seleccionada"
                        }
                    },
                    buttons: {
                        copyTitle: 'Añadido al portapapeles',
                        copyKeys: 'Presione <i> ctrl </i> o <i>\u2318 </i> + <i> C </i> para copiar los datos de la tabla al portapapeles. <br> <br> Para cancelar, haga clic en este mensaje o presione Esc.',
                        copySuccess: {
                            _: '%d filas copiadas',
                            1: '1 fila copiada'
                        }
                    },
                    sSearchPlaceholder: '{{ __('Buscar...') }}',
                    search: '',
                    lengthMenu: '{{ __('Mostrar') }} &nbsp; _MENU_ &nbsp; {{ __('Registros') }}',
                    zeroRecords: '{{ __('No se encontraron resultados') }}',
                    info: '{{ __('Mostrando página') }} _PAGE_ {{ __('de') }} _PAGES_',
                    infoEmpty: '{{ __('No hay registros disponibles') }}',
                    infoFiltered: '({{ __('filtrado de') }} _MAX_ {{ __('registros en total') }})',
                    sInfo: '{{ __('Mostrando del') }} _START_ {{ __('al') }} _END_ {{ __('de') }} _TOTAL_ {{ __('registros por página') }}',
                    paginate: {
                        previous: '{{ __('Anterior') }}',
                        next: '{{ __('Siguiente') }}'
                    },
                    processing: '{{ __('Procesando...') }}',
                }
            });

            let buttons = new $.fn.dataTable.Buttons(table, {
                buttons: [
                    {
                        extend: 'collection',
                        text: 'Exportar',
                        buttons: [
                            { extend: 'copy',
                                text: '{{ __('Copiar') }}',
                                key: {
                                    key: 'c',
                                    altKey: true
                                }
                            },
                            { extend: 'print',
                                text: '{{ __('Imprimir') }}'
                            },
                            'excel',
                            'csv',
                            'pdf'
                        ]
                    }
                ]
            }).container().appendTo($('#ExportButtons'));

        });
    </script>
@endpush
