@extends ('backend.layouts.master')

@section ('title', trans('menus.user_management') . ' | ' . trans('menus.deactivated_users'))

@section('page-header')
    <h1>
        {{ trans('menus.user_management') }}
        <small>{{ trans('menus.deactivated_users') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('menus.deactivated_users') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.header-buttons')
            </div>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>{{ trans('crud.users.id') }}</th>
                        <th>{{ trans('crud.users.name') }}</th>
                        <th>{{ trans('crud.users.email') }}</th>
                        <th>{{ trans('crud.users.confirmed') }}</th>
                        <th>{{ trans('crud.users.roles') }}</th>
                        <th>{{ trans('crud.users.other_permissions') }}</th>
                        <th class="visible-lg">{{ trans('crud.users.created') }}</th>
                        <th class="visible-lg">{{ trans('crud.users.last_updated') }}</th>
                        <th>{{ trans('crud.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($users->count())
                        @foreach ($users as $user)
                            <tr>
                                <td>{!! $user->id !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! link_to("mailto:".$user->email, $user->email) !!}</td>
                                <td>{!! $user->confirmed_label !!}</td>
                                <td>
                                    @if ($user->roles()->count() > 0)
                                        @foreach ($user->roles as $role)
                                            {!! $role->name !!}<br/>
                                        @endforeach
                                    @else
                                        None
                                    @endif
                                </td>
                                <td>
                                    @if ($user->permissions()->count() > 0)
                                        @foreach ($user->permissions as $perm)
                                            {!! $perm->display_name !!}<br/>
                                        @endforeach
                                    @else
                                        None
                                    @endif
                                </td>
                                <td class="visible-lg">{!! $user->created_at->diffForHumans() !!}</td>
                                <td class="visible-lg">{!! $user->updated_at->diffForHumans() !!}</td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    @else
                        <td colspan="9">{{ trans('crud.users.no_deactivated_users') }}</td>
                    @endif
                    </tbody>
                </table>
            </div>

            <div class="pull-left">
                {!! $users->total() !!} {{ trans('crud.users.total') }}
            </div>

            <div class="pull-right">
                {!! $users->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- /.box-body -->
    </div><!--box-->
@stop
