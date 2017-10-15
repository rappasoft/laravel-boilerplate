@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.deactivated'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.users.deactivated') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.access.users.table.last_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.first_name') }}</th>
                        <th>{{ __('labels.backend.access.users.table.email') }}</th>
                        <th>{{ __('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                        <th>Other Permissions</th>
                        <th>{{ __('labels.backend.access.users.table.social') }}</th>
                        <th>{{ __('labels.backend.access.users.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($users->count())
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{!! $user->confirmed_label !!}</td>
                                    <td>{!! $user->roles_label !!}</td>
                                    <td>{!! $user->permissions_label !!}</td>
                                    <td>{!! $user->social_buttons !!}</td>
                                    <td>{{ $user->updated_at->diffForHumans() }}</td>
                                    <td>{!! $user->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="9"><p class="text-center">There are no deactivated users.</p></td></tr>
                        @endif
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
