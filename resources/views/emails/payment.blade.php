<x-mail::message>
    # New Payment Received

    Dear Admin,

    A new payment has been made by **{{ $payment->user->name }}** of amount **${{ $payment->amount }}**.

<x-mail::button :url="route('payments.show', $payment)">
    View Payment
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
