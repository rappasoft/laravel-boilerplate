<div class="form-group">
    <label for="name" class="form-label">{!! trans('setup_wizard::steps.admin_user.view.name') !!}</label>
    {{ Form::text('name', '', [
        'class' => 'form-control'
    ]) }}
</div>
<div class="form-group">
    <label for="email" class="form-label">{!! trans('setup_wizard::steps.admin_user.view.email') !!}</label>
    {{ Form::email('email', '', [
        'class' => 'form-control'
    ]) }}
</div>
<div class="form-group">
    <label for="password" class="form-label">{!! trans('setup_wizard::steps.admin_user.view.password') !!}</label>
    {{ Form::password('password', [
        'class' => 'form-control'
    ]) }}
</div>
<div class="form-group">
    <label for="password_confirmation" class="form-label">{!! trans('setup_wizard::steps.admin_user.view.password_confirmation') !!}</label>
    {{ Form::password('password_confirmation', [
        'class' => 'form-control'
    ]) }}
</div>
<div class="form-group">
    <label for="role" class="form-label">{!! trans('setup_wizard::steps.admin_user.view.role') !!}</label>
    {{ Form::select('role', $availableRoles, null, [
        'class' => 'form-control'
    ]) }}
</div>