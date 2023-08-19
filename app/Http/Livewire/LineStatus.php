<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LineStatus extends Component
{
    public $line;

    public function mount()
    {
        $this->line = Auth::user()?->phoneNumbers()->first();

    }
    public function render()
    {

        return view('livewire.line-status');
    }
}
