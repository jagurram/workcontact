@component('mail::message')
    # User Created event

    User {{$user->email}} has been created.

    Thanks,
    {{ config('app.name') }}

@endcomponent