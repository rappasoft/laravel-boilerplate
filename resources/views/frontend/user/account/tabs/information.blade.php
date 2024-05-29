<div class="table-responsive">
    <table class="table  mb-0 pl-8">
<tr>
            <th></th>            <th></th>

            <!-- <td><img src="{{ $logged_in_user->avatar }}" class="user-profile-image" /></td> -->
            <td>
        @if($logged_in_user->image)
            <img src="{{ asset('profile_pictures/' . $logged_in_user->image) }}" class="user-profile-image" width="130" height="130"/>
        @else
          <img src="{{ $logged_in_user->avatar }}" class="user-profile-image" />
        @endif
        </td>
        <td>
        <x-forms.post :action="route('frontend.user.profilePic.update')" enctype="multipart/form-data">    
            <input type="file" name="profile_picture" >
            <button type="submit" class="btn btn-sm btn-primary ">Update Profile Picture</button>
        </x-forms.post>
    </td>
        </tr>
        </table>
        </div>
<x-forms.patch :action="route('frontend.user.profile.update')">

    <div class="form-group row">
        <label for="name" class="col-md-3 col-form-label text-md-right">@lang('Name')</label>

        <div class="col-md-9">
            <input type="text" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{{ old('name') ?? $logged_in_user->name }}" required autofocus autocomplete="name" />
        </div>
    </div><!--form-group-->

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label text-md-right">@lang('E-mail Address')</label>

            <div class="col-md-9">
                <x-utils.alert type="info" class="mb-3" :dismissable="false">
                    <i class="fas fa-info-circle"></i> @lang('If you change your e-mail you will be logged out until you confirm your new e-mail address.')
                </x-utils.alert>

                <input type="email" name="email" id="email" class="form-control" placeholder="{{ __('E-mail Address') }}" value="{{ old('email') ?? $logged_in_user->email }}" required autocomplete="email" />
            </div>
        </div><!--form-group-->
    @endif

    <div class="form-group row mb-0">
        <div class="col-md-12 text-right">
            <button class="btn btn-sm btn-primary float-right" type="submit">@lang('Update')</button>
        </div>
    </div><!--form-group-->
</x-forms.patch>
