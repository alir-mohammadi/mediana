<?php

namespace App\Http\Livewire;

use App\Models\CallLog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CallsTable extends Component
{
    use WithPagination;

    public function mount()
    {

    }

    public function render()
    {
        $calls = Auth::user()?->calls()->orderBy('created_at','desc')->paginate(10);

        return view('livewire.calls-table',['calls'=>$calls]);
    }
}
