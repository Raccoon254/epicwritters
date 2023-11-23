<x-app-layout>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <button wire:click="create()" class="btn btn-primary">Create New Event</button>

        @if($isOpen)
            @include('livewire.create')
        @endif

        <table class="table table-striped mt-5">
            <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Description</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->start_time }}</td>
                    <td>{{ $event->end_time }}</td>
                    <td>
                        <button wire:click="edit({{ $event->id }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="delete({{ $event->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>

