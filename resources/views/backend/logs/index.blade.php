@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Eventos') . ' | ' . __('Listado de Eventos'))

@section('breadcrumb-links')
    @include('backend.logs.includes.header-buttons')
@endsection

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-calendar-with-a-clock-time-tools"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Eventos') }} <small class="text-muted">{{ __('Listado de Eventos') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <span id="ExportButtons"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="tabla-logs">
                    <thead>
                    <tr>
                        <th class="w-10"></th>
                        <th class="text-center">{{ __('ID DE FILA') }}</th>
                        <th>{{ __('MODELO') }}</th>
                        <th class="text-center">{{ __('TIPO') }}</th>
                        <th class="text-center">{{ __('USUARIO') }}</th>
                        <th class="text-center">{{ __('USUARIO AFECTADO') }}</th>
                        <th class="text-center">{{ __('USUARIO IP') }}</th>
                        <th>{{ __('URL') }}</th>
                        <th class="w-10">{{ __('FECHA') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($logs->count() > 0)
                        @foreach($logs as $log)
                            <tr>
                                <td>
                                    @include('backend.logs.includes.actions', ['log' => $log])
                                </td>
                                <td class="text-center">{{ $log->id }}</td>
                                <td>{{ $log->recordable_type }}</td>
                                <td class="text-center">{{ $log->event }}</td>
                                <td class="text-center">{{ $log->user->username }} ({{ $log->user->full_name }})</td>
                                <td class="text-center">{{ $log->recordableUser->full_name }}</td>
                                <td class="text-center">{{ $log->ip_address }}</td>
                                <td>{{ $log->url }}</td>
                                <td>{{ $log->created_at->tz($logged_in_user->timezone)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>

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
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('body').on('click' , 'a.btnDelete', function(e) {
                e.preventDefault();
                let log_id = $(this).data('log-id');
                let _selector = $('#log_'+log_id);

                swal.fire({
                    title: "{{ __('Estás seguro que desea eliminar este registro?') }}",
                    text: "{{ __('Luego de eliminado, este no podrá ser recuperado.') }}",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: "{{ __('Sí, eliminarlo!') }}",
                    cancelButtonText: "{{ __('No, cancelar!') }}",
                    reverseButtons: true
                }).then((result) => {
                    result.value && _selector.submit();
                });
            });

            $('body').on('click' , 'a.btnDeleteAll', function(e) {
                e.preventDefault();
                let url = $(this).attr('log-id');
                let _selector = $('#deleteAll');

                swal.fire({
                    title: "Estas seguro que desea eliminar todos los registros?",
                    text: "Luego de eliminados, estos no podrán ser recuperados.",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: "{{ __('Sí, eliminarlo!') }}",
                    cancelButtonText: "{{ __('No, cancelar!') }}",
                    reverseButtons: true
                }).then((result) => {
                    result.value && _selector.submit();
                });
            });

            let table = $('#tabla-logs').DataTable({
                dom: "<'row mt-4'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "columnDefs": [ {
                    "targets": 0,
                    "orderable": false
                } ],
                initComplete: function () {
                    this.api().columns([1,3,4,5,6,7,8]).every(function () {
                        let column = this;
                        let holder = '{{ __('Buscar') }}';
                        let header = $('#tabla-logs').DataTable().column( this.index() ).header() ;
                        let input = document.createElement("input");
                        $(input).attr('class', 'form-control');
                        $(input).attr('placeholder', holder  + ' ' +  $(header).html() );

                        $(input).appendTo($(column.footer()).empty())
                            .on('keyup', function () {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());

                                column.search(val ? val : '', true, false).draw();
                            });

                    });

                },
                lengthMenu: [[25, 50, -1], [25, 50, '{{ __('Todos') }}']],
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
