@extends('backend.layouts.app')

@push('after-styles')
    @include('log-viewer::_template.style')
@endpush

@section('content')
    <!--begin::Portlet-->
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-calendar-with-a-clock-time-tools"></i>
                </span>

                <h3 class="kt-portlet__head-title">
                    {{ __('Administración de Errores') }} <small class="text-muted">{{ __('Listado de Errores') }}</small>
                </h3>
            </div>
        </div>

        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-md-2">
                    @include('log-viewer::_partials.menu')
                </div>
                <div class="col-md-10">
                    {{-- Log Details --}}
                    <div class="card">
                        <div class="card-header">
                            {{ __('Información del registro') }}:
                            <div class="float-right">
                                <a href="{{ route('log-viewer::logs.download', [$log->date]) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-download"></i> {{ __('DESCARGAR') }}
                                </a>
                                <a href="#delete-log-modal" class="btn btn-sm btn-danger" data-toggle="modal" data-backdrop="false">
                                    <i class="fa fa-trash"></i> {{ __('ELIMINAR') }}
                                </a>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-2">
                                        {{ __('Ruta del archivo') }}:
                                    </div>
                                    <div class="col-sm-10">
                                        {{ $log->getPath() }}
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-auto">
                                        {{ __('Registros') }}: <span class="badge badge-primary">{{ $entries->total() }}</span>
                                    </div>
                                    <div class="col-sm-auto">
                                        {{ __('Tamaño') }}: <span class="badge badge-primary">{{ $log->size() }}</span>
                                    </div>
                                    <div class="col-sm-auto">
                                        {{ __('Creación') }}: <span class="badge badge-primary">{{ $log->createdAt() }}</span>
                                    </div>
                                    <div class="col-sm-auto">
                                        {{ __('Actualización') }}: <span class="badge badge-primary">{{ $log->updatedAt() }}</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Log Entries --}}
                    <div class="card mt-4">
                        @if($entries->hasPages())
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        {!! $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4') !!}
                                    </div>
                                    <div class="col text-right">
                                <span class="badge badge-info">
                                    {{ __('Página') }} {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                                </span>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="entries" class="table" style="word-break: break-word;">
                                    <thead>
                                    <tr>
                                        <th>{{ __('Ambiente') }}</th>
                                        <th>{{ __('Nivel') }}</th>
                                        <th>{{ __('Hora') }}</th>
                                        <th>{{ __('Cabecera') }}</th>
                                        <th class="text-right">{{ __('Acciones') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($entries as $key => $entry)
                                        <tr>
                                            <td>
                                                <span class="badge badge-env">{{ $entry->env }}</span>
                                            </td>
                                            <td>
                                                <span class="badge level level-{{ $entry->level }}">
                                                    {!! $entry->level() !!}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge badge-default">
                                                    {{ $entry->datetime->format('H:i:s') }}
                                                </span>
                                            </td>
                                            <td style="width:75%;">
                                                {{ $entry->header }}
                                            </td>
                                            <td class="text-right">
                                                @if($entry->hasStack())
                                                    <a class="btn btn-sm btn-outline-info" role="button" data-toggle="collapse" href="#log-stack-{{ $key }}" aria-expanded="false" aria-controls="log-stack-{{ $key }}">
                                                        <i class="fa fa-toggle-on"></i> {{ __('Apilar') }}
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @if($entry->hasStack())
                                            <tr class="stack-content collapse" id="log-stack-{{ $key }}">
                                                <td colspan="5" class="stack">
                                                    {!! trim($entry->stack()) !!}
                                                </td>
                                            </tr>
                                        @endif
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <span class="badge badge-default">{{ __('log-viewer::general.empty-logs') }}</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div><!--table-responsive-->
                        </div><!--card-body-->
                        @if($entries->hasPages())
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col">
                                        {!! $entries->appends(compact('query'))->render('log-viewer::_pagination.bootstrap-4') !!}
                                    </div>
                                    <div class="col text-right">
                            <span class="badge badge-info">
                                {{ __('Página') }} {!! $entries->currentPage() !!} of {!! $entries->lastPage() !!}
                            </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div id="delete-log-modal" class="modal fade">
                <div class="modal-dialog">
                    <form id="delete-log-form" action="{{ route('log-viewer::logs.delete') }}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="date" value="{{ $log->date }}">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('Eliminar Archivo de Registro') }}Delete Log File</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>{{ __('Está seguro que desea') }} <span class="badge badge-danger">{{ __('ELIMINAR') }}</span> {{ __('este archivo de registro') }} <span class="badge badge-primary">{{ $log->date }}</span> ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-danger" data-loading-text="Loading&hellip;"><i class="fa fa-trash"></i> {{ __('ELIMINAR ARCHIVO') }}</button>
                                <button type="button" class="btn btn-sm btn-primary pull-left" data-dismiss="modal"><i class="fa fa-times"></i> {{ __('CANCELAR') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@push('after-scripts')
    <script>
        $(function () {
            var deleteLogModal = $('#delete-log-modal'),
                deleteLogForm  = $('#delete-log-form'),
                submitBtn      = deleteLogForm.find('button[type=submit]');

            deleteLogForm.on('submit', function(event) {
                event.preventDefault();
                submitBtn.button('loading');

                $.ajax({
                    url:      $(this).attr('action'),
                    type:     $(this).attr('method'),
                    dataType: 'json',
                    data:     $(this).serialize(),
                    success: function(data) {
                        submitBtn.button('reset');
                        if (data.result === 'success') {
                            deleteLogModal.modal('hide');
                            location.replace("{{ route('log-viewer::logs.list') }}");
                        }
                        else {
                            alert('OOPS ! This is a lack of coffee exception!')
                        }
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        alert('AJAX ERROR ! Mira la consola !');
                        console.error(errorThrown);
                        submitBtn.button('reset');
                    }
                });

                return false;
            });

            @unless(empty(log_styler()->toHighlight()))
            $('.stack-content').each(function() {
                var $this = $(this);
                var html = $this.html().trim()
                    .replace(/({!! join(log_styler()->toHighlight(), '|') !!})/gm, '<strong>$1</strong>');

                $this.html(html);
            });
            @endunless
        });
    </script>
@endpush
