@impersonating
    <div class="alert alert-warning mb-0">
        You are currently logged in as {{ $logged_in_user->name }}. <a href="{{ route('impersonate.leave') }}">Return to your account</a>.
    </div><!--alert alert-warning-->
@endImpersonating
