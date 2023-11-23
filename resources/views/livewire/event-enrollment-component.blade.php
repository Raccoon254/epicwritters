<div>
    <div wire:loading
         class="fixed top-0 left-0 w-full h-full bg-gray-300 backdrop-blur-sm bg-opacity-80 z-50 flex justify-center items-center">
        <div class="text-white flex items-center h-full justify-center text-lg font-semibold">
            <div class="loader">
                <span class="loading bg-orange-800 loading-ring loading-lg"></span>
            </div>
        </div>
    </div>
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Events</h1>

    <!--if empty-->
    @if($events->isEmpty())
        <div class="flex rounded shadow p-5 ring-1 ring-inset ring-offset-1 items-center justify-center">
            <div class="text-center">
                <p class="text-gray-600">No events found. Please check back later.</p>
                <span class="loading loading-ring loading-lg"></span>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($events as $event)
            <div
                class="card flex flex-col justify-between bg-white shadow-md rounded-lg overflow-hidden transform hover:scale-[102%] transition-transform duration-200 ease-in-out">
                <div class="p-4">
                    <h3 class="text-xl font-bold">{{ $event->name }}</h3>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p class="text-sm text-gray-500">
                        Starts: {{ \Carbon\Carbon::parse($event->start_time)->diffForHumans() }}</p>
                    <p class="text-sm text-gray-500">
                        Ends: {{ \Carbon\Carbon::parse($event->end_time)->diffForHumans() }}</p>
                    <p class="text-sm text-gray-500">
                        Duration: {{ \Carbon\Carbon::parse($event->start_time)->diffInHours($event->end_time) }}
                        hours {{ \Carbon\Carbon::parse($event->start_time)->addHours(\Carbon\Carbon::parse($event->start_time)->diffInHours($event->end_time))->diffInMinutes($event->end_time) }}
                        minutes</p>
                </div>
                <div class="px-4 pb-4">
                    @if(Auth::user()->events->contains($event))
                        <button wire:click="unenroll({{ $event->id }})" class="btn btn-danger flex items-center">
                            <i class="fas fa-minus-circle mr-2"></i> Unenroll
                        </button>
                    @else
                        <button wire:click="enroll({{ $event->id }})" class="btn btn-primary flex items-center">
                            <i class="fas fa-plus-circle mr-2"></i> Enroll
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <script>
        window.addEventListener('refreshComponent', event => {
            location.reload()
        })
    </script>
</div>
