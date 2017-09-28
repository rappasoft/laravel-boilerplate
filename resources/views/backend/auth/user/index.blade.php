@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Static Link</a>

                <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                    <a class="dropdown-item" href="#">Submenu #1</a>
                    <a class="dropdown-item" href="#">Submenu #2</a>
                    <a class="dropdown-item" href="#">Submenu #3</a>
                </div>
            </div>

            <div class="dropdown">
                <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Static Link</a>

                <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-2">
                    <a class="dropdown-item" href="#">Submenu #1</a>
                    <a class="dropdown-item" href="#">Submenu #2</a>
                    <a class="dropdown-item" href="#">Submenu #3</a>
                </div>
            </div>
            
            <a class="btn" href="#">Static Link</a>
        </div>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('labels.backend.access.users.active') }}

            @include('backend.auth.user.includes.header-buttons')
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
                                <td>{!! $user->confirmed_label !!}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                                <td>{!! $user->action_buttons !!}</td>
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
