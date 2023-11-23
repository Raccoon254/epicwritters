<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Event;

class EventComponent extends Component
{
    public $events, $name, $description, $start_time, $end_time, $event_id;
    public $isOpen = 0;
    public $showModal = false;
    public $action = '';


    public function create(): void
    {
        $this->resetInputFields();
        $this->action = 'create';
        $this->showModal = true;
    }

    public function edit($id): void
    {
        $event = Event::findOrFail($id);
        $this->event_id = $id;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->start_time = $event->start_time;
        $this->end_time = $event->end_time;

        $this->action = 'edit';
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }


    public function render(): View
    {
        $this->events = Event::all();
        return view('livewire.event-component');
    }

    public function openModal(): void
    {
        $this->isOpen = true;
    }

    private function resetInputFields(): void
    {
        $this->name = '';
        $this->description = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->event_id = '';
    }

    public function store(): void
    {
        $this->validate([
            'name' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Event::updateOrCreate(['id' => $this->event_id], [
            'name' => $this->name,
            'description' => $this->description,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time
        ]);

        session()->flash('message',
            $this->event_id ? 'Event Updated Successfully.' : 'Event Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

   public function update(): void
{
    $this->validate([
        'name' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    Event::updateOrCreate(['id' => $this->event_id], [
        'name' => $this->name,
        'description' => $this->description,
        'start_time' => $this->start_time,
        'end_time' => $this->end_time
    ]);

    session()->flash('message', 'Event Updated Successfully.');

    $this->closeModal();
    $this->resetInputFields();
}

    public function delete($id)
    {
        Event::find($id)->delete();
        session()->flash('message', 'Event Deleted Successfully.');
    }
}
