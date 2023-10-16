<?php

namespace App\Http\Livewire;

use App\Models\CallLog;
use Illuminate\Contracts\Encryption\DecryptException;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class FeedBackLink extends Component
{
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

    public $callId;

    public function mount()
    {
        try {
            $callLogs = CallLog ::query() -> where('from', ($this -> callId)) -> get();
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
            ($this -> callId)) -> first() -> meta ?? $this -> input;

    }
    public function render()
    {
        return view('livewire.feed-back-link');
    }

    public function save()
    {
        \App\Models\Feedback::updateOrCreate(
            [
                'call_id' => ($this->callId),
            ]
            ,[
            'call_id' => ($this->callId),
            'creator' => auth()?->id() ?? "Anonymous",
            'meta' => $this->input,
        ]);
        $this->emit('hideModal-feedback');
        $this->emit('toastMessage', 'success', ["message" => 'بازخورد با موفقیت ذخیره شد.']);

    }
}
