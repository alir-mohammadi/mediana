<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CallsTable extends Component
{

    use WithPagination;


    public function render()
    {
        $calls = Auth ::user() ?-> phoneNumbers() -> first() -> callLogs() -> orderBy('created_at',
            'desc') -> get() -> map(function ($call) {
            return [...$call -> toArray(), ...$call -> meta_data];
        });
        $calls = $calls -> groupBy('from') -> map(function (Collection $calls) {
            return
                [
                    "meta_data" => [
                        'Type'              => $calls -> first()[ 'duration' ],
                        'HangupCause'       => $calls -> where('HangupCause', 'NORMAL_CLEARING') -> count(),
                        'Duration'          => $calls -> max('Duration'),
                        'CallerIdNumber'    => $calls -> first()[ 'CallerIdNumber' ],
                        'DestinationNumber' => $calls -> sortBy('StartTime')->last()[ 'DestinationNumber' ],
                        'DigitsDialed'      => $calls -> firstWhere('DigitsDialed', '!=',
                                'none')[ 'DigitsDialed' ] ?? null,
                        'created_at'        => $calls -> first()[ 'created_at' ],
                    ],
                    'from' => $calls -> first()[ 'from' ],
                ];
        });

        return view('livewire.calls-table') -> with('calls', $this -> paginateCollection($calls));
    }

    public function paginateCollection(Collection $collection, int $perPage = 10, int $page = null, $options = [])
    {
        $page = $page ? : (LengthAwarePaginator ::resolveCurrentPage() ? : 1);

        return new LengthAwarePaginator(
            $collection -> forPage($page, $perPage),
            $collection -> count(),
            $perPage,
            $page,
            $options
        );
    }

    public function feedback($call_id)
    {
        $this->emit('feedback',encrypt($call_id));
        $this->emit('showModal');
    }
}
