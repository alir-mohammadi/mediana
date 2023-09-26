<?php

namespace App\Http\Livewire;

use App\Models\CallLog;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Feedback extends Component
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
    ];

    public $call_id;

    public function mount()
    {
        try {

        $callLogs = CallLog::query()->where('from',decrypt($this->call_id))->get();
        }
        catch (DecryptException $e)
        {
           return redirect()->route('home');
        }
        $this->data['type'] = $callLogs->last()->duration ? "خروجی" : "ورودی ";
        $this->data['number'] = $callLogs->last()->meta_data['CallerIdNumber'];
        $this->input = \App\Models\Feedback::query()->where('call_id',decrypt($this->call_id))->first()->meta ?? $this->input;
    }
    public function render()
    {
        return view('livewire.feedback');
    }

    public function save()
    {
        \App\Models\Feedback::updateOrCreate(
            [
                'call_id' => decrypt($this->call_id),
        ]
            ,[
            'call_id' => decrypt($this->call_id),
            'creator' => auth()?->id() ?? "Anonymous",
            'meta' => $this->input,
        ]);
    }
}
