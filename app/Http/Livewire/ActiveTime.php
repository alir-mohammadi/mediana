<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ActiveTime extends Component
{
     public $activeTime;

    public function mount()
    {
        $this->activeTime = Auth()->user()?->phoneNumbers()->first()->activeTime?->toArray() ?? [
            'from_day'  => 1,
            'to_day'    => 7,
            'from_time' => "00:00",
            'to_time'   => "23:30",
        ];
     }

    public function render()
    {
        return view('livewire.active-time');
    }

    public function store()
    {
        Auth()->user()->phoneNumbers()->first()->activeTime()->updateOrCreate([],[
            'from_day'  => $this->activeTime['from_day'],
            'to_day'    => $this->activeTime['to_day'],
            'from_time' => $this->activeTime['from_time'],
            'to_time'   => $this->activeTime['to_time'],
        ]);

        $this->emit('toastMessage', 'success', ["message" => 'تنظیمات با موفقیت ذخیره شد.']);

    }
}
