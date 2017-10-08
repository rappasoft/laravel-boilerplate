@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('page-header')
    <!-- <h5 class="mb-4">{{ __('labels.backend.access.roles.management') }}
        <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
    </h5> -->
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.roles.management') }}
                    <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
                </h4>

                <div class="small text-muted">
                    Roles Management Dashboard
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <button onclick="window.history.back();"class="btn btn-warning ml-1" data-toggle="tooltip" title="Return Back"><i class="fa fa-reply"></i></button>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <hr>

        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('admin.auth.role.update', $role) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">
                            {{ __('validation.attributes.backend.access.roles.name') }}
                        </label>

                        <div class="col-md-10">
                            <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('validation.attributes.backend.access.roles.name') }}" value="{{ $role->name }}" maxlength="191" required="required" autofocus="autofocus">
                        </div>
                    </div><!--form-group-->

                    <div class="form-group row">
                        <label class="col-md-2 form-control-label" for="name">
                            {{ __('validation.attributes.backend.access.roles.associated_permissions') }}
                        </label>

                        <div class="col-md-10">
                            @if ($permissions->count())
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label for="permission-{{ $permission->id }}">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="permission-{{ $permission->id }}" {{ in_array($permission->name, $rolePermissions) ? 'checked="checked"' : '' }} />
                                            {{ ucwords($permission->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div><!--form-group-->

                    <div class="row">
                        <div class="col">
                            {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                            {{ form_submit(__('buttons.general.crud.update')) }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    Updated: {{$role->updated_at->diffForHumans()}},
                    Created at: {{$role->created_at->toCookieString()}}
                </small>
            </div>
        </div>
    </div>
</div>

@endsection
