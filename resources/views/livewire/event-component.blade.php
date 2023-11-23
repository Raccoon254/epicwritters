<div>
    @if(session()->has('message'))
        <div class="alert rounded alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

        <button wire:click="create()" class="btn btn-primary">Create New Event</button>

        @if($showModal)
    <dialog id="my_modal_3" class="modal" open>
        <div class="modal-box bg-white p-6 rounded-md shadow-lg max-w-lg mx-auto">
            <form method="dialog" wire:submit.prevent="{{ $action == 'create' ? 'store' : 'update' }}">
                <button class="ring ring-inset btn absolute rounded-full top-2 right-2" wire:click="closeModal()">✕</button>
                <h3 class="font-bold text-center text-lg mb-4">{{ $action == 'create' ? 'Create Event' : 'Edit Event' }}</h3>
                <div class="py-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="py-2">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                    <textarea id="description" wire:model="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="py-2">
                    <label for="start_time" class="block text-gray-700 text-sm font-bold mb-2">Start Time</label>
                    <input type="datetime-local" id="start_time" wire:model="start_time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="py-2">
                    <label for="end_time" class="block text-gray-700 text-sm font-bold mb-2">End Time</label>
                    <input type="datetime-local" id="end_time" wire:model="end_time" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-secondary">{{ $action == 'create' ? 'Create' : 'Update' }}</button>
                </div>
            </form>
        </div>
    </dialog>
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
                <td class="flex gap-2">
                    <button wire:click="edit({{ $event->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $event->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
