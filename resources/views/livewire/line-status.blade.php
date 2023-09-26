<div
    class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 pl-0 pr-0 w-full   border-2 border-gray-300 rounded-lg">
    <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
        <caption
            class="p-5 text-lg font-semibold text-center text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            لیست شماره‌ها
        </caption>
        <thead
            class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 border-2 ">
        <tr>
            <th scope="col" class="px-6 py-3">
                روز‌های باقیمانده
            </th>
            <th scope="col" class="px-6 py-3">
                 دقایق خروجی
            </th>
            <th scope="col" class="px-6 py-3">
                دقایق باقیمانده خروجی
            </th>
            <th scope="col" class="px-6 py-3">
                نوع بسته
            </th>
            <th scope="col" class="px-6 py-3">
                شماره خط
            </th>
            <th scope="col" class="px-6 py-3">
               وضعیت
            </th>
        </tr>
        </thead>
        <tbody class="border-gray-300 border-t-0 rounded">
        @php
            $package = Auth::user()->packages()->first();
        @endphp
        @if(!$lines->isEmpty())
            @foreach($lines as $line)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                    <td class="px-6 py-4">
                        {{$package?->pivot?->expire_at ?? "-"}}
                    </td>
                    <td class="px-6 py-4">
                        {{$package?->outgoing_seconds ? gmdate('i',$package?->outgoing_seconds): "-"}}
                    </td>
                    <td class="px-6 py-4">
                        {{$package?->pivot?->remaining_outgoing_seconds ? gmdate('i',$package?->remaining_outgoing_seconds) :"-"}}
                    </td>
                    <td class="px-6 py-4">
                        {{$package->type ?? "-"}}
                    </td>
                    <td class="px-6 py-4">
                        {{$line["phone_number"]}}
                    </td>
                    <td class="px-6 py-4 text-green-600">
                        فعال
                    </td>
                </tr>
            @endforeach

        @else
            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                <th></th>
                <th></th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    تماسی یافت نشد.
                </th>
                <th></th>
                <th></th>
            </tr>
        @endif


        </tbody>

    </table>


    <div wire:poll.2000ms>
    </div>
</div>
