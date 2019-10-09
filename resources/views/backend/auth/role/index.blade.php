@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('Administración de Roles'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('Administración de Roles') }}
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.auth.role.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{ __('Rol') }}</th>
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
                                                @foreach($role->permissions as $permission)
                                                    {{ ucwords($permission->module->name) }} ({{ $permission->name }}) <br />
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
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $roles->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
