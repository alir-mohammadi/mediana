<?php

namespace App\Http\Livewire;

use App\Models\CallLog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CallsTable extends Component
{
    use WithPagination;

    public $calls = [];

    public function render()
    {
        return view('livewire.calls-table');
    }
}
