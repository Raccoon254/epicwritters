<x-app-layout>
    <!-- check if $payments exists -->
    @if($payments->count())
        <div class="container flex items-center justify-center">
            <div class="row w-full md:w-9/12">
                <div class="overflow-x-auto">
                    <table class="table table-auto table-md text-gray-800">
                        <!-- head -->
                        <thead class="my-3">
                            <tr class="text-[20px] font-medium my-5 text-gray-800">
                                <th>Payment ID</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->transaction_code }}</td>
                                    <td>
                                        @if($payment->amount == 0)
                                            <i class='fa-solid fa-circle-notch fa-spin'></i>
                                        @else
                                            KSH {{ $payment->amount }}
                                        @endif
                                    </td>
                                    <td>{{ $payment->created_at->diffForHumans() }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>
                                        <a href="{{ route('payments.show', $payment) }}" class="btn ring btn-outline text-gray-900 btn-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M256 32c12.5 0 24.1 6.4 30.8 17L503.4 394.4c5.6 8.9 8.6 19.2 8.6 29.7c0 30.9-25 55.9-55.9 55.9H55.9C25 480 0 455 0 424.1c0-10.5 3-20.8 8.6-29.7L225.2 49c6.6-10.6 18.3-17 30.8-17zm65 192L256 120.4 176.9 246.5l18.3 24.4c6.4 8.5 19.2 8.5 25.6 0l25.6-34.1c6-8.1 15.5-12.8 25.6-12.8h49z"/></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>No Payments</h1>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
