<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">Pricing</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Start lessons for only 500KSH and get access to all courses.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">
                        Starter
                    </h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                        Best option for individuals getting started with <span class="font-semibold text-orange-600">EpicWriters™️</span>
                    </p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-bold">500</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <a href="{{ route('make.payment', ['amount' => 500]) }}" class="text-white bg-orange-600 ring hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get started</a>
                </div>
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Professional</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Relevant for users who want to use <span class="font-semibold text-orange-600">EpicWriters™️</span></p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-bold">1K</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <a href="{{ route('make.payment', ['amount' => 1000]) }}" class="text-white bg-pink-600 ring hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get started</a>
                </div>
                <!-- Pricing Card -->
                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Epic Writers™️</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">Best for users who're going to proceed to receive tasks from us </p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-bold">2k</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <a href="{{ route('make.payment', ['amount' => 2000]) }}" class="text-white bg-warning ring hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get started</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

