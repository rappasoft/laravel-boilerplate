<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered mb-0">
        <tr>
            <th>@lang('Type')</th>
            <td>@include('backend.auth.user.includes.type', ['user' => $logged_in_user])</td>
        </tr>

        <tr>
            <th>@lang('Avatar')</th>
            <!-- <td><img src="{{ $logged_in_user->avatar }}" class="user-profile-image" /></td> -->
            <td>
            @if($logged_in_user->image)
            <img src="{{ asset('profile_pictures/' . $logged_in_user->image) }}" class="user-profile-image" width="130" height="130"/>
        @else
          <img src="{{ $logged_in_user->avatar }}" class="user-profile-image" />
        @endif
        </td>
            <!-- <td>
        @if($logged_in_user->image)
            <img src="{{ asset('profile_pictures/' . $logged_in_user->image) }}" class="user-profile-image" width="130" height="130"/>
        @else
          <img src="{{ $logged_in_user->avatar }}" class="user-profile-image" />
        @endif
        <x-forms.post :action="route('frontend.user.profilePic.update')" enctype="multipart/form-data">    
            <input type="file" name="profile_picture">
            <button type="submit">Change Profile Picture</button>
        </x-forms.post>
    </td> -->
        </tr>

        <tr>
            <th>@lang('Name')</th>
            <td>{{ $logged_in_user->name }}</td>
        </tr>

        <tr>
            <th>@lang('E-mail Address')</th>
            <td>{{ $logged_in_user->email }}</td>
        </tr>

        @if ($logged_in_user->isSocial())
            <tr>
                <th>@lang('Social Provider')</th>
                <td>{{ ucfirst($logged_in_user->provider) }}</td>
            </tr>
        @endif

        <tr>
            <th>@lang('Timezone')</th>
            <td>{{ $logged_in_user->timezone ? str_replace('_', ' ', $logged_in_user->timezone) : __('N/A') }}</td>
        </tr>

        <tr>
            <th>@lang('Account Created')</th>
            <td>@displayDate($logged_in_user->created_at) ({{ $logged_in_user->created_at->diffForHumans() }})</td>
        </tr>

        <tr>
            <th>@lang('Last Updated')</th>
            <td>@displayDate($logged_in_user->updated_at) ({{ $logged_in_user->updated_at->diffForHumans() }})</td>
        </tr>
    </table>
</div><!--table-responsive-->
