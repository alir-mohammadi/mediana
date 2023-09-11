<?php

namespace App\Http\Livewire;

use App\Models\Operator;
use Livewire\Component;
use Livewire\WithPagination;

class Operators extends Component
{

    use WithPagination;

    protected $listeners = ['operatorAdded' => 'render'];

    public $selectedOperatorId = null;
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

    public function editModel($id)
    {
        $this->input = Operator::find($id)?->toArray();
        $this->selectedOperatorId = $id;
        $this->emit('showModal');
    }

    public function save()
    {
        Operator::where('id', $this->selectedOperatorId)->update($this->input);
        $this->emit('hideModal');
    }
}
