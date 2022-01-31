@component('mail::message')
Hello Admin,


A report was received:

Reason: {{ $report->reason }}

Comment: {{ $report->comment }}

@component('mail::button', ['url' => $url])
    View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
