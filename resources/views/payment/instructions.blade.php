<x-app-layout>

    @php($amount = request()->amount)
<div class="w-full grid place-items-center">
    <div class="main flex flex-col sm:flex-row justify-center items-center w-11/12 sm:w-10/12 md:w-9/12">

        <div class="w-full sm:w-1/2 flex gap-4 justify-center items-center p-4 sm:flex-col h-full">
            <img class="w-[100px] md:w-[300px]" src="{{ asset('storage/safaricom.png') }}" alt="M-Pesa" >
            <img class="w-[100px] md:w-[300px]" src="{{ asset('storage/airtel.png') }}" alt="Airtel">
        </div>

        <div class="bg-white shadow-sm flex flex-col gap-5 rounded-sm w-full sm:w-1/2 p-5">

            <h1 class="text-3xl font-semibold text-gray-600">Payment Instructions</h1>

            <p class="text-gray-700 text-xl leading-relaxed">
                To make a payment of <span class="font-semibold text-blue-600">{{ $amount }}</span>, please follow these steps:
            </p>

            <ol class="list-decimal pl-10 space-y-3 text-gray-700 leading-relaxed">
                <li>Go to your M-Pesa menu on your phone.</li>
                <li>Select "Lipa na M-Pesa".</li>
                <li>Select "Buy Goods and Services".</li>
                <li>Enter the Till Number: <span class="text-xl text-primary" id="tillNumber">8966286</span>
                    <button data-tip="Click to copy" class="btn mx-2 btn-xs tooltip ring-2 ring-gray-900 btn-secondary rounded-sm" onclick="copyTillNumber()">
                        <svg fill="white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M208 0H332.1c12.7 0 24.9 5.1 33.9 14.1l67.9 67.9c9 9 14.1 21.2 14.1 33.9V336c0 26.5-21.5 48-48 48H208c-26.5 0-48-21.5-48-48V48c0-26.5 21.5-48 48-48zM48 128h80v64H64V448H256V416h64v48c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48z"/></svg>
                    </button>
                </li>
                <li>Enter the amount: <span class="text-xl text-blue-600">{{ $amount }}</span>.</li>
                <li>Follow the prompts to complete the transaction.</li>
            </ol>

            <script>
                function copyTillNumber() {
                    const el = document.createElement('textarea');
                    el.value = document.getElementById('tillNumber').textContent;
                    document.body.appendChild(el);
                    el.select();
                    document.execCommand('copy');
                    document.body.removeChild(el);

                    // Optional: Display a message to inform the user that the number has been copied
                    alert('Till Number copied!');
                }
            </script>


            <p class="text-xs text-gray-400 italic leading-relaxed">
                If you face any issues, please contact our support team via:
                <span>
                    <a href="mailto:{{ config('mail.support.address') }}" class="text-blue-600 hover:underline">
                        GMAIL
                    </a>
                </span>
            </p>

            <div class="mt-3 text-center">
                <form action="{{ route('payments.submit') }}" method="POST">
                @csrf
                    <input class="ring input w-full input-info bg-gray-50 text-gray-900" required type="text" placeholder="Enter M-Pesa Transaction Code" name="transaction_code" id="transaction_code">

                    <div class="flex mt-4 justify-center items-center gap-3">
                        <x-primary-button class="">
                            Submit
                            <svg fill="white" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M320 0H141.3C124.3 0 108 6.7 96 18.7L18.7 96C6.7 108 0 124.3 0 141.3V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zM160 88v48c0 13.3-10.7 24-24 24s-24-10.7-24-24V88c0-13.3 10.7-24 24-24s24 10.7 24 24zm80 0v48c0 13.3-10.7 24-24 24s-24-10.7-24-24V88c0-13.3 10.7-24 24-24s24 10.7 24 24zm80 0v48c0 13.3-10.7 24-24 24s-24-10.7-24-24V88c0-13.3 10.7-24 24-24s24 10.7 24 24z"/></svg>
                        </x-primary-button>

                        <a href="{{ route('home') }}" class="">
                        <span class="btn ring btn-outline font-semibold text-xs text-gray-900 uppercase tracking-widest min-w-[100px] focus:ring-offset-2 transition ease-in-out duration-150 ring-green-500">
                            Home <svg fill="black" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                        </span>
                        </a>
                    </div>

                </form>


            </div>
        </div>
    </div>
</div>

</x-app-layout>
