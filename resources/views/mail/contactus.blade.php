@component('mail::message')
# Contact Us

Contacted By:
{{ $contact->name }}

Contact Email:
{{ $contact->email }}

Message:
{{ $contact->message }}
@endcomponent
