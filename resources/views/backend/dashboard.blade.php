@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('Tablero de Control'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('Bienvenido') }} {{ $logged_in_user->name }}!</strong>
                </div><!--card-header-->
                <div class="card-body">
                    <pre>
                        @foreach ($permissions as $permission)
                            {{ $permission->module->name }}
                        @endforeach
                    </pre>
                </div><!--card-body-->

                <p>All System Settings:</p>
                @foreach($setting->all() as $k => $v)
                    <li>
                        {{ $k }}: {{ $v }}
                    </li>
                @endforeach
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->
@endsection
