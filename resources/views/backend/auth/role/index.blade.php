@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management'))

@section('page-header')
    <h5 class="mb-4">{{ __('labels.backend.access.roles.management') }}</h5>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('labels.backend.access.roles.management') }}

            @include('backend.auth.role.includes.header-buttons')
        </div><!-- box-header -->

        <div class="card-body">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>{{ __('labels.backend.access.roles.table.role') }}</th>
                    <th>{{ __('labels.backend.access.roles.table.permissions') }}</th>
                    <th>{{ __('labels.backend.access.roles.table.number_of_users') }}</th>
                    <th>{{ __('labels.general.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ ucfirst($role->name) }}</td>
                            <td>
                                @if ($role->id == 1)
                                    All
                                @else
                                    @if ($role->permissions->count())
                                        @foreach ($role->permissions as $permission)
                                            {{ ucwords($permission->name) }}
                                        @endforeach
                                    @else
                                        None
                                    @endif
                                @endif
                            </td>
                            <td>{{ $role->users->count() }}</td>
                            <td>{!! $role->action_buttons !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pull-left">
                {!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}
            </div>

            <div class="pull-right">
                {!! $roles->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- card-body -->
    </div><!--card-->
@endsection
