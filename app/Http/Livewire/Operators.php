<?php

namespace App\Http\Livewire;

use App\Models\Operator;
use Livewire\Component;
use Livewire\WithPagination;

class Operators extends Component
{

    use WithPagination;

    public $input = [
        'name' => '',
        'phone_number' => '',
        'active' => true,
        'outgoing_access' => true,
    ];
    public function render()
    {
        return view('livewire.operators') -> with('operators',
            auth() -> user() -> phoneNumbers() -> first() -> operators() -> paginate(10));
    }

    public function delete($id)
    {
        Operator::find($id) -> delete();
    }

    public function edit($id)
    {
        $this->input = Operator::find($id)?->toArray();

        $this->emit('showModal');
    }
}
