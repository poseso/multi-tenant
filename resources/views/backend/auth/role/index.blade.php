@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Perfiles'))

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-lock"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Perfiles') }} <small class="text-muted">{{ __('Perfiles Activos') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <span class="d-none d-lg-inline" id="ExportButtons"></span>
                        @include('backend.auth.role.includes.header-buttons')
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <table id="tabla-perfiles" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>{{ __('Perfil') }}</th>
                    <th>{{ __('Permisos') }}</th>
                    <th>{{ __('Número de Usuarios') }}</th>
                    <th>{{ __('Acciones') }}</th>
                </tr>
                </thead>

                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ ucwords($role->name) }}</td>
                        <td>
                            @if($role->id === 1)
                                {{ __('Todos') }}
                            @else
                                @if($role->permissions->count())
                                    @foreach($perm as $modulo => $permisos)
                                        <strong style="font-weight: 500;">{{ $modulo }}</strong> ({{ implode(', ', $permisos) }})<br />
                                    @endforeach
                                @else
                                    {{ __('Ninguno') }}
                                @endif
                            @endif
                        </td>
                        <td>{{ $role->users->count() }}</td>
                        <td>@include('backend.auth.role.includes.actions', ['role' => $role])</td>
                    </tr>
                @endforeach
                </tbody>

                <tfoot>
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
            let table = $('#tabla-perfiles').DataTable({
                dom: "<'row mt-4'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                select: true,
                responsive: true,

                initComplete: function () {
                    this.api().columns([0]).every(function () {
                        let column = this;
                        let header = $('#tabla-perfiles').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search( val ? '^'+val+'$' : '', true, false ).draw();
                            });
                    });

                    this.api().columns([0, 1]).every(function () {
                        let column = this;
                        let header = $('#tabla-perfiles').DataTable().column( this.index() ).header() ;
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
                    targets: [3],
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
