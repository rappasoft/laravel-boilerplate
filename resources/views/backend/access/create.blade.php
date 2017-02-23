@extends ('backend.layouts.app')

@section ('title', __('User Management') . ' | ' . __('Create User'))

@section('page-header')
    <h1>
        {{ __('User Management') }}
        <small>{{ __('Create User') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => 'admin.access.user.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Create User') }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('name', __('Name'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Name')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('email', __('E-mail Address'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('E-mail Address')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password', __('Password'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => __('Password')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', __('Password Confirmation'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-10">
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => __('Password Confirmation')]) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', __('Active'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('status', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('confirmed', __('Confirmed'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmed', '1', true) }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    <label class="col-lg-2 control-label">{{ __('Send Confirmation E-mail') }}<br/>
                        <small>{{ __('(If confirmed is off)') }}</small>
                    </label>

                    <div class="col-lg-1">
                        {{ Form::checkbox('confirmation_email', '1') }}
                    </div><!--col-lg-1-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('status', __('Associated Roles'), ['class' => 'col-lg-2 control-label']) }}

                    <div class="col-lg-3">
                        @if (count($roles) > 0)
                            @foreach($roles as $role)
                                <input type="checkbox" value="{{ $role->id }}" name="assignees_roles[{{ $role->id }}]" id="role-{{ $role->id }}" {{ is_array(old('assignees_roles')) && in_array($role->id, old('assignees_roles')) ? 'checked' : '' }} /> <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                <a href="#" data-role="role_{{ $role->id }}" class="show-permissions small">
                                    (
                                        <span class="show-text">{{ __('Show') }}</span>
                                        <span class="hide-text hidden">{{ __('Hide') }}</span>
                                        {{ __('Permissions') }}
                                    )
                                </a>
                                <br/>
                                <div class="permission-list hidden" data-role="role_{{ $role->id }}">
                                    @if ($role->all)
                                        {{ __('All Permissions') }}<br/><br/>
                                    @else
                                        @if (count($role->permissions) > 0)
                                            <blockquote class="small">{{--
                                        --}}@foreach ($role->permissions as $perm){{--
                                            --}}{{$perm->display_name}}<br/>
                                                @endforeach
                                            </blockquote>
                                        @else
                                            {{ __('No Permissions') }}<br/><br/>
                                        @endif
                                    @endif
                                </div><!--permission list-->
                            @endforeach
                        @else
                            {{ __('No Roles to set.') }}
                        @endif
                    </div><!--col-lg-3-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', __('Cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(__('Create'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection

@section('after-scripts')
    {{ Html::script('js/backend/access/users/script.js') }}
@endsection
