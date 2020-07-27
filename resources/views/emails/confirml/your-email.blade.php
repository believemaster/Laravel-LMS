@component('mail::message')
# One More Step Before Joining Believe Master Magic

We Need Email Confirmation

@component('mail::button', ['url' => route('confirm-email').'?token='.$user->confirm_token])
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
