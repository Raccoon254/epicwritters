<x-app-layout>
    <section class="upper grid sm:grid-cols-2 md:grid-cols-4 gap-2">
        @foreach($cards as $card)
            <a href="{{ $card['route'] }}" class="rounded-md h-40 flex flex-col ring-1 ring-offset-1 ring-inset justify-center items-center shadow card-hover hover:bg-accent">
                <i class="{{ $card['icon'] }} fa-5x card-icon"></i>
                <p>{{ $card['content'] }}</p>
            </a>
        @endforeach
    </section>
</x-app-layout>
