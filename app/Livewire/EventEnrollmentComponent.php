<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventEnrollmentComponent extends Component
{
    public $events;

    public function mount()
    {
        $this->events = Event::all();
    }

    public function render()
    {
        return view('livewire.event-enrollment-component');
    }

    public function enroll($eventId)
    {
        $event = Event::find($eventId);
        Auth::user()->events()->attach($event);
        $this->emit('refreshComponent');
    }

    public function unenroll($eventId)
    {
        $event = Event::find($eventId);
        Auth::user()->events()->detach($event);
        $this->emit('refreshComponent');
    }

    private function emit(string $string)
    {
        $this->dispatch($string);
    }
}
