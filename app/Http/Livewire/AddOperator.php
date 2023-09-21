<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddOperator extends Component
{
    public $input = [
        'name' => '',
        'phone_number' => '',
        'active' => true,
        'outgoing_access' => true,
    ];
    public function render()
    {
        return view('livewire.add-operator');
    }

    public function save()
    {
        $line = Auth::user()?->phoneNumbers()->first();

        if ($line->operators()->where('phone_number', $this->input['phone_number'])->exists()) {
            $this->emit('toastMessage', 'error', ["message" => 'اوپراتور با این شماره قبلا ثبت شده است.']);

            return;
        }
        $line->operators()->create($this->input);

        $this->input = [
            'name' => '',
            'phone_number' => '',
            'active' => true,
            'outgoing_access' => true,
        ];

        $this->emit('operatorAdded');
    }
}
