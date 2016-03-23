<p>{!! trans('setup_wizard::steps.access.view.action_summary') !!}</p>

<ul class="list-group">
    <li class="list-group-item">{{ trans('setup_wizard::steps.access.view.roles') }} <span class="badge">{{ $count['roles'] }}</span></li>
    <li class="list-group-item">{{ trans('setup_wizard::steps.access.view.groups') }} <span class="badge">{{ $count['groups'] }}</span></li>
    <li class="list-group-item">{{ trans('setup_wizard::steps.access.view.permissions') }} <span class="badge">{{ $count['permissions'] }}</span></li>
</ul>


