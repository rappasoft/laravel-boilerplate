@impersonating
    <div class="alert alert-warning logged-in-as">
        You are currently logged in as {{ auth()->user()->name }}. <a href="{{ route('impersonate.leave') }}">Return to your account</a>.
    </div><!--alert alert-warning logged-in-as-->
@endImpersonating
