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

    public $operators =[];

    public $direct;

    public function mount()
    {
        /**
         * Represents a variable line.
         *
         * @var PhoneNumber $line The content of the line.
         */
        $line = Auth::user()?->phoneNumbers()->first();

        $this->direct = $line->direct;

        $line->operators()->firstOrCreate([
            'name' => Auth::user()->name,
            'phone_number' => Auth::user()->email,
        ]);
        $this->operators = $line->operators()->get()->map(fn($item) => [
            'id' => $item->id,
            'name' => $item->name,
            'phone_number' => $item->phone_number,
        ])->toArray();

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

        $line->update([
            'direct' => $this->direct
        ]);

        foreach ($this->internals as $key => $internal) {
            $validate = Validator::make($internal, [
                'main' => 'nullable|exists:operators,id',
                'backup' => 'nullable|exists:operators,id'
            ]);
            if ($validate->fails()) {
                $this->emit('toastMessage', 'error', ["message" =>'شماره وارد شده نامعتبر است.']);
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
