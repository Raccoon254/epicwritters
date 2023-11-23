<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventEnrollmentComponent extends Component
{
    public $events;

    public function mount(): void
    {
        $this->events = Event::all();
    }

    public function render(): View
    {
        return view('livewire.event-enrollment');
    }

    public function enroll(Event $event): void
    {
        Auth::user()->events()->attach($event);
        session()->flash('message', 'You have successfully enrolled for the event.');
    }

    public function unenroll(Event $event): void
    {
        Auth::user()->events()->detach($event);
        session()->flash('message', 'You have successfully unenrolled from the event.');
    }
}
