@foreach($admin->notifications as $notification)
    <div>
        New payment of {{ $notification->data['amount'] }} received. <a href="/verify-payment/{{ $notification->data['payment_id'] }}">Verify Now</a>
    </div>
@endforeach
