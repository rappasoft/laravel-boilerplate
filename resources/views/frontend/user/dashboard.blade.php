@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-10 col-md-offset-1">

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('navs.dashboard') }}</div>

				<div class="panel-body">
					<div role="tabpanel">

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.my_information') }}</a></li>
                      </ul>

                      <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <table class="table table-striped table-hover table-bordered dashboard-table">
                                <tr>
                                    <th>{{ trans('validation.attributes.avatar') }}</th>
                                    <td><img src="{!! $user->picture !!}" class="user-profile-image" /></td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.name') }}</th>
                                    <td>{!! $user->name !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.email') }}</th>
                                    <td>{!! $user->email !!}</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.created_at') }}</th>
                                    <td>{!! $user->created_at !!} ({!! $user->created_at->diffForHumans() !!})</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.last_updated') }}</th>
                                    <td>{!! $user->updated_at !!} ({!! $user->updated_at->diffForHumans() !!})</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('validation.attributes.actions') }}</th>
                                    <td>
                                        <a href="{!!route('frontend.profile.edit')!!}" class="btn btn-primary btn-xs">{{ trans('labels.edit_information') }}</a>
                                        @if (access()->user()->canChangePassword())
                                            <a href="{!!url('auth/password/change')!!}" class="btn btn-warning btn-xs">{{ trans('navs.change_password') }}</a>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div><!--tab panel profile-->

                      </div><!--tab content-->

                    </div><!--tab panel-->

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection