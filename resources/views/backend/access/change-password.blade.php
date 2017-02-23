@extends ('backend.layouts.app')

@section ('title', __('User Management') . ' | ' . __('Change Password'))

@section('page-header')
    <h1>
        {{ __('User Management') }}
        <small>{{ __('Change Password') }}</small>
    </h1>
@endsection

@section('content')
    {{ Form::open(['route' => ['admin.access.user.change-password', $user], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'patch']) }}

        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ __('Change Password for :user',['user' => $user->name]) }}</h3>

                <div class="box-tools pull-right">
                    @include('backend.access.includes.partials.user-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->

            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('password', __('Password'), ['class' => 'col-lg-2 control-label', 'placeholder' => __('Password')]) }}

                    <div class="col-lg-10">
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->

                <div class="form-group">
                    {{ Form::label('password_confirmation', __('Password Confirmation'), ['class' => 'col-lg-2 control-label', 'placeholder' => __('Password Confirmation')]) }}

                    <div class="col-lg-10">
                        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                    </div><!--col-lg-10-->
                </div><!--form control-->
            </div><!-- /.box-body -->
        </div><!--box-->

        <div class="box box-info">
            <div class="box-body">
                <div class="pull-left">
                    {{ link_to_route('admin.access.user.index', __('Cancel'), [], ['class' => 'btn btn-danger btn-xs']) }}
                </div><!--pull-left-->

                <div class="pull-right">
                    {{ Form::submit(__('Update'), ['class' => 'btn btn-success btn-xs']) }}
                </div><!--pull-right-->

                <div class="clearfix"></div>
            </div><!-- /.box-body -->
        </div><!--box-->

    {{ Form::close() }}
@endsection
