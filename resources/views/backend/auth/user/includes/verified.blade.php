@if ($model->isVerified())
    <span class="badge badge-success">@lang('Yes')</span>
@else
    <span class="badge badge-success">@lang('No')</span>
@endif
