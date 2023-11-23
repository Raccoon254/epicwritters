<x-app-layout>
    <div class="flex h-full justify-center items-center">
        <div class="rounded-2xl">
            <div class="flex justify-center items-center bg-gray-100 text-gray-700">
                <i class="fa-solid fa-lock-alt text-9xl"></i>
            </div>
            <div class="bg-white p-4 flex flex-col justify-center items-center">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">This page is locked</h1>
                <p class="text-gray-700 text-center">You need to be a member to access this page.</p>
                <div class="flex gap-2">
                    <a href="{{ route('payment.instructions') }}" class="btn btn-secondary btn-sm ring-1 ring-inset ring-primary">Membership</a>
                    <a href="{{route('payments.user')}}" class="btn btn-primary btn-sm ring-1 ring-inset ring-primary">View Payments</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
