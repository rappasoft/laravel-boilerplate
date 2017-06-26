<p>You have a new contact form request: Below are the details:</p>

<p><strong>{{ trans('validation.attributes.frontend.name') }}:</strong> {{ $request->name }}</p>
<p><strong>{{ trans('validation.attributes.frontend.email') }}:</strong> {{ $request->email }}</p>
<p><strong>{{ trans('validation.attributes.frontend.phone') }}:</strong> {{ $request->phone or "N/A" }}</p>
<p><strong>{{ trans('validation.attributes.frontend.message') }}:</strong> {{ $request->message }}</p>