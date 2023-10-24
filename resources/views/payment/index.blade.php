<x-app-layout>
    <h1>All Payments</h1>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>${{ $payment->amount }}</td>
                <td>{{ $payment->status }}</td>
                <td>
                    <a href="{{ route('payments.show', $payment) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
