<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class LastAccessedFrom extends Component
{
    public string $lastLoggedInAt;
    public string $lastLoggedInFrom;

    public function mount()
    {
        $this->fill([
            'lastLoggedInAt' => auth()->user()->last_loggedin_at->diffForHumans(),
            'lastLoggedInFrom' => auth()->user()->last_loggedin_from,
        ]);
    }

    public function render()
    {
        return view('livewire.profile.last-accessed-from');
    }
}
