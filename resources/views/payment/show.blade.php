<x-app-layout>
    <div class="max-w-7xl mx-auto py-3 px-2 sm:px-6 lg:px-8 grid md:grid-cols-1 lg:grid-cols-2 gap-4">
        <h1 class="text-3xl text-center font-bold text-gray-900 mb-6 col-span-full">Payment Details</h1>

        <!-- User Details with FontAwesome Icons -->
        <div class="bg-white p-4 rounded-md shadow-sm">
            <h2 class="text-2xl text-center font-semibold border-b p-2 text-gray-800 mb-4">User Details</h2>
            <div class="flex flex-col gap-4">
                <div class="flex justify-between items-center border-b p-2">
                    <i class="fa-solid fa-circle-user text-blue-600 text-2xl mr-3"></i>
                    <div class="w-1/2"><p>{{ $payment->user->name }}</p></div>
                </div>

                <div class="flex overflow-clip justify-between items-center border-b p-2">
                    <i class="fas fa-envelope text-red-600 text-2xl mr-3"></i>
                    <div class="w-1/2"><p>{{ $payment->user->email }}</p></div>
                </div>

                <div class="flex justify-between items-center border-b p-2">
                    <i class="fas fa-phone text-green-600 text-2xl mr-3"></i>
                    <div class="w-1/2"><p>{{ $payment->user->phone_number }}</p></div>
                </div>
            </div>

        </div>

        <!-- Payment Details -->
        <div class="bg-white p-4 rounded-md shadow-sm">

            <h2 class="text-2xl text-center font-semibold border-b p-2 text-gray-800 mb-4">Payment Details</h2>

            <div class="flex flex-col gap-4">
                <div class="flex justify-between items-center border-b p-2">
                    <i class="fa-solid fa-fingerprint text-yellow-600 text-2xl mr-3"></i>
                    <div class="w-1/2"><p>T{{ $payment->id }}EPIC</p></div>
                </div>

                <div class="flex justify-between items-center border-b p-2">
                    <i class="fas fa-coins text-purple-600 text-2xl mr-3"></i>
                    <div class="w-1/2">
                        <p>
                            @if($payment->amount == 0)
                                <progress class="progress progress-info w-6/12 md:w-8/12 lg:w-10/12"></progress>
                            @else
                               KSH {{ $payment->amount }}
                            @endif
                        </p>
                        @if($payment->amount == 0)
                            <span class="text-[10px] items-center flex text-red-500">
                                This payment is being processed. Please wait.
                                                         <span class="loading loading-dots loading-md"></span>
                            </span>
                        @else
                            <span class="text-xs text-green-500">
                                Your payment has been processed.
                            </span>
                        @endif

                    </div>
                </div>

                <div class="flex justify-between items-center border-b p-2">
                    <i class="fa-solid fa-shield-halved text-pink-600 text-2xl mr-3"></i>
                    <div class="w-1/2">
                        <p>
                           {{ $payment->status }}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="max-w-7xl mx-auto py-3 px-2 sm:px-6 lg:px-8 grid md:grid-cols-1 lg:grid-cols-2 gap-4">
        <!-- Edit Fields for Admins -->
        <div class="p-4 rounded-md shadow-sm">
            @can('manage')
                @if($payment->status != 'verified')
                    <form action="{{ route('payments.verify', $payment) }}" method="POST" class=" flex items-center gap-4 mt-4">
                        @csrf
                        <div class="w-9/12">
                            <input type="number" name="amount" id="amount" class="focus:ring-indigo-500 ring focus:border-indigo-500 block w-full shadow-md sm:text-lg border-gray-300 rounded-md" required value="{{ $payment->amount }}">
                        </div>
                        <x-primary-button type="submit">Verify Payment</x-primary-button>
                    </form>
                @endif
            @endcan
        </div>
    </div>
</x-app-layout>
