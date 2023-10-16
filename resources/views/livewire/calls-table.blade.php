<div
    class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 pl-0 pr-0 w-full   border-2 border-gray-300 rounded-lg">
    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
        <caption
            class="p-5 text-lg font-semibold text-center text-gray-900 bg-white dark:text-white dark:bg-gray-800">
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
        @php
        @endphp
        @if($calls instanceof \Illuminate\Pagination\LengthAwarePaginator && !$calls->isEmpty())
            @foreach($calls as $call)
                @php
                    $meta = $call['meta_data']
                @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <th scope="row"
                        class="{{ $meta["HangupCause"] ? 'text-green-400':'text-red-600' }} text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$meta["HangupCause"]   ? "پاسخ‌داده‌شده":"پاسخ‌داده‌نشده"}}
                    </th>
                    <td class="px-6 py-4">
                        {{gmdate("i:s",$meta["Duration"])}}
                    </td>
                    <td class="px-6 py-4">
                        {{$meta["CallerIdNumber"]}}
                    </td>
                    <td class="px-6 py-4">
                        {{$meta["DestinationNumber"]}}
                    </td>
                    <td class="px-6 py-4">
                        {{($meta["DigitsDialed"] ?? null) != 'none' ? $meta["DigitsDialed"]:"-"}}
                    </td>
                    <td class="px-6 py-4">
                        {{ strlen($meta["DigitsDialed"] ?? "") > 6 ? "خروجی" : "ورودی "}}
                    </td>
                    <td class="px-6 py-4">
                        {{\Morilog\Jalali\Jalalian::forge(Carbon\Carbon::parse($meta['created_at'])->setTimezone('Asia/Tehran')->format('Y/m/d H:i:s'))->format("Y/m/d H:i:s")}}
                    </td>
                    <td class="px-6 py-4 text-right">
{{--                        <a href="#" class="font-medium text-green-600 dark:text-green-500 hover:underline">پخش</a>--}}
{{--                        <a href="#" wire:click="feedback('{{$call['from']}}')" class="font-medium text-green-600 dark:text-green-500 hover:underline">بازخورد</a>--}}
                        <button wire:click="feedback('{{$call['from']}}')"
                        type="button"
                        class="p-2 focus:outline-none text-green-400 bg-none border-2 border-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                            بازخورد
                        </button>
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

    {{$calls->links()}}
{{--    <div wire:poll.2000ms>--}}



</div>
