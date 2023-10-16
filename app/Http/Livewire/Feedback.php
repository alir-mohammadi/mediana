<?php

namespace App\Http\Livewire;

use App\Models\CallLog;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class Feedback extends Component
{

    public $listeners =['feedback' => 'callId'];

    public $input = [
        'name' => null,
        'opportunity' => null,
        'type' => null,
        'description' => null,
    ];

    public $data = [
        'type' => null,
        'number' => null,
        'time' => null,
    ];

    public $call_id;
    /**
     * @var true
     */
    private bool $showModal = false;

    public function mount()
    {

        $this -> fetchData();

    }
    public function render()
    {
        return view('livewire.feedback');
    }

    public function save()
    {
        \App\Models\Feedback::updateOrCreate(
            [
                'call_id' => ($this->call_id),
        ]
            ,[
            'call_id' => ($this->call_id),
            'creator' => auth()?->id() ?? "Anonymous",
            'meta' => $this->input,
        ]);
        $this->emit('hideModal-feedback');

    }
    public function callId($call_id)
    {
        $this->call_id = $call_id;
        $this->fetchData();
//        $this->showModal = true;
        $this->emit('showModal-feedback');
    }

    /**
     * @return void
     */
    public function fetchData(): void
    {
        try {

            $callLogs = CallLog ::query() -> where('from', ($this -> call_id)) -> get();
        } catch (DecryptException $e) {
            return;
        }
       if ($callLogs -> isEmpty()) {
            return;
        }

        $this -> data[ 'type' ] = $callLogs -> last() -> duration ? "خروجی" : "ورودی ";
        $this -> data[ 'type' ] .= "تماس با شماره".' 0'.$callLogs -> last() -> meta_data[ 'BlazarNumber' ];
        $this -> data[ 'time' ] = Jalalian ::forge('now - '.$callLogs -> last() -> created_at -> diffInMinutes(now()).' minutes') -> ago();
        $this -> data[ 'number' ] = $callLogs -> last() -> meta_data[ 'CallerIdNumber' ];
        $this -> input = \App\Models\Feedback ::query() -> where('call_id',
            ($this -> call_id)) -> first() -> meta ?? $this -> input;
    }

}
