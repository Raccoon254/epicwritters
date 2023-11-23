<x-app-layout>
    <section class="upper grid grid-cols-4">
        @foreach($cards as $card)
            <a href="{{ $card['route'] }}" class="card h-40 flex justify-center items-center shadow">
                <i class="{{ $card['icon'] }}"></i>
                <p>{{ $card['content'] }}</p>
            </a>
        @endforeach
    </section>
</x-app-layout>
