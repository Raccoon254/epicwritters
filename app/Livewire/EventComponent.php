<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventComponent extends Component
{
    public $events, $name, $description, $start_time, $end_time, $event_id;
    public $isOpen = 0;

    public function render()
    {
        $this->events = Event::all();
        return view('livewire.events');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->start_time = '';
        $this->end_time = '';
        $this->event_id = '';
    }

    public function store()
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

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $this->event_id = $id;
        $this->name = $event->name;
        $this->description = $event->description;
        $this->start_time = $event->start_time;
        $this->end_time = $event->end_time;

        $this->openModal();
    }

    public function delete($id)
    {
        Event::find($id)->delete();
        session()->flash('message', 'Event Deleted Successfully.');
    }
}
