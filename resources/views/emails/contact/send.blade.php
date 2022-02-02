@component('mail::message')
Hi Admin,

New contact message for you:

From: {{ $request->name }}

Phone: @isset($request->phone) {{$request->phone}} @endisset
<br>
Message: {{ $request->message }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
