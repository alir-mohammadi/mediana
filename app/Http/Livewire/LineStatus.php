<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LineStatus extends Component
{
    public $line;

    public function mount()
    {
        $this->lines = Auth::user()?->phoneNumbers()->get();

    }
    public function render()
    {

        return view('livewire.line-status');
    }
}
