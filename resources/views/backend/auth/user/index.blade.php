@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <a class="btn" href="#">Static Link</a>
            <a class="btn" href="#">Static Link</a>
        </div>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('labels.backend.access.users.active') }}

            <div class="pull-right">
                @include('backend.auth.user.includes.header-buttons')
            </div><!--pull-right-->
        </div><!-- box-header -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.email') }}</th>
                        <th>{{ __('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                        <th>{{ __('labels.backend.access.users.table.social') }}</th>
                        <th>{{ __('labels.backend.access.users.table.created') }}</th>
                        <th>{{ __('labels.backend.access.users.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>{{ $user->actions }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--table-responsive-->

            <div class="pull-left">
                {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
            </div>

            <div class="pull-right">
                {!! $users->render() !!}
            </div>

            <div class="clearfix"></div>
        </div><!-- card-body -->
    </div><!--card-->
@endsection
