<x-app-layout>
    <h1>Payment Details</h1>

    <p>ID: {{ $payment->id }}</p>
    <p>Amount: ${{ $payment->amount }}</p>
    <p>Status: {{ $payment->status }}</p>

    @if($payment->status != 'verified')
        <form action="{{ route('payments.verify', $payment) }}" method="POST">
            @csrf
            <x-primary-button type="submit">Verify Payment</x-primary-button>
        </form>
    @endif
</x-app-layout>
