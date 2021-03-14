@component('mail::message')
{{ $email->body }}

Thanks,<br>
{{ config('app.name') }}
<img src="{{ $email->getTrackingURL() }}" width="1" height="0">
@endcomponent
