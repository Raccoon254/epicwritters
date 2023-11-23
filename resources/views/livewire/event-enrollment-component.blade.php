<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach($events as $event)
            <div class="card">
                <h3>{{ $event->name }}</h3>
                <p>{{ $event->description }}</p>
                @if(Auth::user()->events->contains($event))
                    <button wire:click="unenroll({{ $event->id }})" class="btn btn-danger">Unenroll</button>
                @else
                    <button wire:click="enroll({{ $event->id }})" class="btn btn-primary">Enroll</button>
                @endif
            </div>
        @endforeach
    </div>
</div>
