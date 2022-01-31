@component('mail::message')
Hello Admin,


A report was received:

Item: {{ Str::remove('App\Models\\', $report->reportable_type) }}

Reason: {{ $report->reason }}

Comment: {{ $report->comment }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
