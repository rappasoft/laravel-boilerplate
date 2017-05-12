@component('mail::message')
# Contact Us

Contacted By:<br />
{{ $contact->name }}<br />
<br />
Contact Email:<br />
{{ $contact->email }}<br />
<br />
Message:<br />
{{ $contact->message }}<br />
@endcomponent
