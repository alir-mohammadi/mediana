<?php

namespace App\Http\Livewire;

use App\Models\PhoneNumber;
use App\Models\RedirectNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class InternalSettings extends Component
{

    public $internals =[];

    public function mount()
    {
        /**
         * Represents a variable line.
         *
         * @var PhoneNumber $line The content of the line.
         */
        $line = Auth::user()?->phoneNumbers()->first();

        $this->internals= $line->redirects()->get()->map(fn($item) => [
            'main' => $item->redirect_phone_number,
            'backup' => $item->backup_redirect_phone_number,
            'number' => $item->number,
        ])->keyBy('number')->toArray();
    }
    public function render()
    {
        return view('livewire.internal-settings');
    }

    public function store()
    {

        /**
         * Represents a variable line.
         *
         * @var PhoneNumber $line The content of the line.
         */
        $line = Auth::user()?->phoneNumbers()->first();
        foreach ($this->internals as $key => $internal) {
            $validate = Validator::make($internal, [
                'main' => 'required|numeric|digits:11',
                'backup' => 'nullable|numeric|digits:11',
            ]);
            if ($validate->fails()) {
                $this->emit('toastMessage', 'validation_error', $validate->errors()->first());
                return;
            }
           $line->redirects()->updateOrCreate(
               [
                   'number' => $key
               ]
               ,
               [
                   'number' => $key,
                   'redirect_phone_number' => $internal['main'] ?? null,
                   'backup_redirect_phone_number' => $internal['backup'] ?? null,
               ]);

        }

        $this->emit('toastMessage', 'success', ["message" => 'تنظیمات با موفقیت ذخیره شد.']);

        session()->flash('message', 'Settings successfully saved.');
    }

    public function failedValidation($response)
    {
        $this->emit('toastMessage', 'validation_error', $response->validator->errors()->first());
    }
}
