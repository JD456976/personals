@component('mail::message')
Hi,

Someone just replied to your ad:

{{ $message }}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
