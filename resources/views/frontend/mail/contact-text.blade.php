@lang('strings.emails.contact.email_body_title')

@lang('validation.attributes.frontend.name'): {{ $request->name }}
@lang('validation.attributes.frontend.email'): {{ $request->email }}
@lang('validation.attributes.frontend.phone'): {{ $request->phone ?? 'N/A' }}
@lang('validation.attributes.frontend.message'): {{ $request->message }}
