<x-app-layout>
    <div class="max-w-7xl mx-auto py-3 px-2 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">Payment Details</h1>

        <!-- User Details with FontAwesome Icons -->
        <div class="mb-6 bg-white p-2 md:p-4 rounded-ms shadow-sm">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">User Details</h2>
            <p><i class="fas fa-user mr-2"></i>Name: {{ $payment->user->name }}</p>
            <p><i class="fas fa-envelope mr-2"></i>Email: {{ $payment->user->email }}</p>
            <p><i class="fas fa-phone mr-2"></i>Phone: {{ $payment->user->phone_number }}</p>
        </div>

        <!-- Payment Details -->
        <div class="bg-white p-2 md:p-4 rounded-md shadow-sm">
            <p><i class="fas fa-file-invoice-dollar mr-2"></i>ID: {{ $payment->id }}</p>
            <p class="flex items-center"><i class="fas fa-dollar-sign mr-2"></i>
                @if($payment->amount == 0)
                    Amount: &nbsp; <progress class="progress progress-info w-6/12 md:w-8/12 lg:w-10/12"></progress>
                @else
                    Amount: KSH {{ $payment->amount }}
                @endif
            </p>
            <p><i class="fas fa-tasks mr-2"></i>Status: {{ $payment->status }}</p>

            <!-- Edit Fields for Admins -->
            @can('manage')
                @if($payment->status != 'verified')
                    <form action="{{ route('payments.verify', $payment) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                            <input type="number" name="amount" id="amount" class="mt-1 focus:ring-indigo-500 ring focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required value="{{ $payment->amount }}">
                        </div>
                        <x-primary-button type="submit">Verify Payment</x-primary-button>
                    </form>
                @endif
            @endcan
        </div>
    </div>
</x-app-layout>
