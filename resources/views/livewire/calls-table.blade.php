
    <table class="w-full text-sm text-right text-gray-500 dark:text-gray-400">
        <caption
            class="p-5 text-lg font-semibold text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            لیست تماس‌ها
        </caption>
        <thead
            class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 border-2 ">
        <tr>
            <th scope="col" class="px-6 py-3">
                وضعیت تماس
            </th>
            <th scope="col" class="px-6 py-3">
                مدت زمان
            </th>
            <th scope="col" class="px-6 py-3">
                گیرنده تماس
            </th>
            <th scope="col" class="px-6 py-3">
                دریافت‌کننده تماس
            </th>
            <th scope="col" class="px-6 py-3">
                داخلی
            </th>
            <th scope="col" class="px-6 py-3">
                نوع تماس
            </th>
            <th scope="col" class="px-6 py-3">
                تاریخ تماس
            </th>
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">پخش</span>
            </th>
        </tr>
        </thead>
        <tbody class="border-gray-300 border-t-0 rounded">
            @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator && !$calls->isEmpty())
                @foreach($calls as $call)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                        <th scope="row" class="{{ $$call->status ? 'text-green-400':'text-red-600' }}px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$call->status ? "پاسخ‌داده‌شده":"پاسخ‌داده‌نشده"}}
                        </th>
                        <td class="px-6 py-4">
                            {{$call->duration}}
                        </td>
                        <td class="px-6 py-4">
                            {{$call->from}}
                        </td>
                        <td class="px-6 py-4">
                            {{$call->to}}
                        </td>
                        <td class="px-6 py-4">
                            {{$call->internal}}
                        </td>
                        <td class="px-6 py-4">
                            {{$call->type}}
                        </td>
                        <td class="px-6 py-4">
                            {{$call->created_at}}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-green-600 dark:text-green-500 hover:underline">پخش</a>
                        </td>
                    </tr>
                @endforeach

            @else
                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        تماسی یافت نشد.
                    </th>
                </tr>
            @endif


        </tbody>
    </table>

    <div wire:poll.2000ms>
    </div>
