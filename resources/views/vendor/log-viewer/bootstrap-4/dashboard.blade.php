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
                <div class="col-md-3">
                    <canvas id="stats-doughnut-chart" height="300"></canvas>
                </div>

                <div class="col-md-9">
                    <div class="row">
                        @foreach($percents as $level => $item)
                            <div class="col-md-4 col-sm-6 mb-3">
                                <div class="card level-card level-{{ $level }} {{ $item['count'] === 0 ? 'level-empty' : '' }}">
                                    <div class="card-header">
                                        <span class="level-icon">{!! log_styler()->icon($level) !!}</span> {{ $item['name'] }}
                                    </div>
                                    <div class="card-body">
                                        {{ $item['count'] }} entries - {!! $item['percent'] !!}%
                                        <div class="progress">
                                            <div class="progress-bar" style="width: {{ $item['percent'] }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Portlet-->
@endsection

@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.min.js"></script>
    <script>
        Chart.defaults.global.responsive      = true;
        Chart.defaults.global.scaleFontFamily = "'Source Sans Pro'";
        Chart.defaults.global.animationEasing = "easeOutQuart";
    </script>
    <script>
        $(function() {
            new Chart($('canvas#stats-doughnut-chart'), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
@endpush
