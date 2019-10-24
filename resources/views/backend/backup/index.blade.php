@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Administración de Copias de Seguridad'))

{{ style('assets/vendors/custom/ladda/ladda.min.css') }}
{{ style('assets/vendors/custom/pnotify/pnotify.css') }}
{{ style('assets/vendors/custom/pnotify/pnotify.brighttheme.css') }}

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet" data-ktportlet="true" id="kt_portlet_tools_3">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand kt-menu__link-icon flaticon-users-1"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Copias de Seguridad') }} <small class="text-muted">{{ __('Listado de Copias de Seguridad') }}</small>
                </h3>
            </div>

            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">&nbsp;
                        <span id="ExportButtons"></span>
                        <a id="create-new-backup-button" href="{{ route('admin.backup.create') }}" class="btn btn-dark btn-elevate btn-icon-sm ladda-button" data-style="zoom-in" data-toggle="kt-tooltip-desktop" data-skin="brand" title="{{ __('Crear Nueva Copia de Seguridad') }}">
                            <span class="ladda-label">
                                <i class="la la-plus"></i>
                                {{ __('Crear una copia de seguridad') }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <input type="hidden" id="BackupQty" value="{{ count($backups) }}" />
            <div id="content">
                @if (count($backups) > 0)
                    <div class="table-responsive">
                        <table id="table-backups" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{ __('Ubicación') }}</th>
                                <th>{{ __('Fecha') }}</th>
                                <th>{{ __('Tamaño del fichero') }}</th>
                                <th class="w-20">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($backups as $k => $b)
                                <tr>
                                    <th class="text-center" scope="row">{{ $k+1 }}</th>
                                    <td>{{ $b['disk'] }}</td>
                                    <td>{{ \Carbon\Carbon::createFromTimeStamp($b['last_modified'])->tz($logged_in_user->timezone)->format(get_full_date()) }}</td>
                                    <td>{{ round((int)$b['file_size']/1048576, 2).' MB' }}</td>
                                    <td class="text-center">
                                        @if ($b['download'])
                                            <a class="btn btn-warning btn-icon" href="{{ route('admin.backup.download') }}?disk={{ $b['disk'] }}&path={{ urlencode($b['file_path']) }}&file_name={{ urlencode($b['file_name']) }}" data-toggle="kt-tooltip-desktop" data-skin="brand" title="{{ __('Descargar') }}">
                                                <i class="fas fa-cloud-download-alt"></i>
                                            </a>
                                        @endif
                                        <a class="btn btn-danger btn-icon" data-button-type="delete" href="{{ route('admin.backup.delete', $b['file_name']) }}/?disk={{ $b['disk'] }}" data-toggle="kt-tooltip-desktop" data-skin="brand" title="{{ __('Eliminar') }}">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                            <tfoot>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tfoot>
                        </table>
                    </div>
                @else
                    <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                    <h5>{{ __('No hay copias de seguridad disponibles') }}</h5>
                @endif
            </div>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@push('after-scripts')
    {!! script('assets/vendors/custom/ladda/spin.min.js') !!}
    {!! script('assets/vendors/custom/ladda/ladda.min.js') !!}
    {!! script('assets/vendors/custom/pnotify/pnotify.js') !!}
    <script>
        jQuery(document).ready(function($) {
            var backupQuantity = parseInt($('#BackupQty').val());
            // capture the Create new backup button
            $("#create-new-backup-button").click(function(e) {
                e.preventDefault();
                var create_backup_url = $(this).attr('href');
                // Create a new instance of ladda for the specified button
                var l = Ladda.create( document.querySelector( '#create-new-backup-button' ) );
                // Start loading
                l.start();
                // Will display a progress bar for 10% of the button width
                l.setProgress( 0.1 );
                setTimeout(function(){ l.setProgress( 0.3 ); }, 2000);
                // do the backup through ajax
                $.ajax({
                    url: create_backup_url,
                    type: 'PUT',
                    success: function(result) {
                        l.setProgress( 0.9 );
                        // Show an alert with the result
                        if (result.indexOf('failed') >= 0) {
                            new PNotify({
                                title: "{{ __('Estamos presentando problemas') }}",
                                text: "{{ __('La copia de seguridad puede que no se haya realizado. Por favor verifica los logs para más detalles.') }}",
                                type: "warning"
                            });
                        } else {
                            new PNotify({
                                title: "{{ __('Se ha completado la copia de seguridad') }}",
                                text: "{{ __('Recargando la página en 3 segundos.') }}",
                                type: "success"
                            });
                        }
                        // Stop loading
                        l.setProgress( 1 );
                        l.stop();
                        // refresh the page to show the new file
                        setTimeout(function(){ location.reload(); }, 3000);
                    },
                    error: function(result) {
                        l.setProgress( 0.9 );
                        // Show an alert with the result
                        new PNotify({
                            title: "{{ __('Error al realizar la copia de seguridad') }}",
                            text: "{{ __('La copia de seguridad no se pudo crear.') }}",
                            type: "warning"
                        });
                        // Stop loading
                        l.stop();
                    }
                });
            });

            // capture the delete button
            $("[data-button-type=delete]").click(function(e) {
                e.preventDefault();

                const delete_url = $(this).attr('href');
                const delete_button = $(this);
                const title = (delete_button.attr('data-trans-title')) ? delete_button.attr('data-trans-title') : 'Está seguro que desea hacer esto?';
                const cancel = (delete_button.attr('data-trans-button-cancel')) ? delete_button.attr('data-trans-button-cancel') : 'Cancelar';
                const confirm = (delete_button.attr('data-trans-button-confirm')) ? delete_button.attr('data-trans-button-confirm') : 'Continuar';

                Swal.fire({
                    title: title,
                    showCancelButton: true,
                    confirmButtonText: confirm,
                    cancelButtonText: cancel,
                    type: 'info'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: delete_url,
                            type: 'DELETE',
                            success: function(result) {
                                backupQuantity--;
                                // Show an alert with the result
                                new PNotify({
                                    title: "{{ __('Confirmado') }}",
                                    text: "{{ __('La copia de seguridad ha sido eliminada.') }}",
                                    type: "success"
                                });
                                // delete the row from the table
                                delete_button.parentsUntil('tr').parent().remove();

                                if(backupQuantity <= 0) {
                                    $('#content').html(`
                                        <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                        <h5>{{ __('No hay copias de seguridad disponibles') }}</h5>
                                    `);
                                }
                            },
                            error: function(result) {
                                // Show an alert with the result
                                new PNotify({
                                    title: "{{ __('Ups, ha ocurrido un error') }}",
                                    text: "{{ __('La copia de seguridad no se pudo eliminar.') }}",
                                    type: "warning"
                                });
                            }
                        });
                    } else {
                        new PNotify({
                            title: "{{ __('La operación ha sido cancelada') }}",
                            text: "{{ __('La copia de seguridad no ha sido eliminada.') }}",
                            type: "info"
                        });
                    }

                });
            });

            let table = $('#table-backups').DataTable({
                dom: "<'row mt-4'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'i><'col-sm-7'p>>",
                "columnDefs": [ {
                    "targets": 4,
                    "orderable": false
                } ],
                "aaSorting": [[ 2, "desc" ]],
                initComplete: function () {
                    this.api().columns([0, 1, 2]).every(function () {
                        let column = this;
                        let holder = '{{ __('Buscar') }}';
                        let header = $('#table-backups').DataTable().column( this.index() ).header() ;
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
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, '{{ __('Todos') }}']],
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

            @if($count > 0)
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
            @endif
        });
    </script>
@endpush
