<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h4>
        تنظیمات زمان‌بندی
    </h4>
    <p class="text-gray-500 pt-2 pb-1">در این بخش می‌توانید برای ساعات پاسخگویی، زمان‌بندی دلخواه خود را تعریف کنید.</p>
    <div class="flex">
        <p class="text-gray-500 pt-1 pb-4">
            در ساعات غیر ساعات وارد شده تماس به شماره شما دایورت نمی‌شود و پیام زمان غیر کاری پخش می‌شود.
        </p>

        <a href="{{route('phone-settings')}}">
            <button type="button"
                    class=" text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                انتخاب فایل صوتی
            </button>
        </a>
    </div>
    @php
        $interval = new DateInterval("PT30M");
$start = new DateTime("00:00");
$end = new DateTime("24:00");

$times = array();
for ($intStart=$start; $intStart<$end; $intStart->add($interval)) {
$times[] = $intStart->format('H:i');
}

    @endphp
    <div
        class=" p-4 w-full bg-gray-50 border-2 border-gray-300 rounded-lg">


        <div class="flex p-4 pt-2  flex-col  gap-2">

            <div class="  flex item-center gap-4 align-middle items-center">
                <p>
                    از روز
                </p>
                <div>
                    <select wire:model="activeTime.from_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                        <option {{($activeTime["from_day"] ?? 1) == 1 ? "selected":"" }} value="1">شنبه</option>
                        <option {{($activeTime["from_day"] ?? 1) == 2 ? "selected":"" }} value="2">یک شنبه</option>
                        <option {{($activeTime["from_day"] ?? 1) == 3 ? "selected":"" }} value="3">دو شنبه </option>
                        <option {{($activeTime["from_day"] ?? 1) == 4 ? "selected":"" }} value="4"> سه شنبه </option>
                        <option {{($activeTime["from_day"] ?? 1) == 5 ? "selected":"" }} value="5">چهار شنبه</option>
                        <option {{($activeTime["from_day"] ?? 1) == 6 ? "selected":"" }} value="6">پنج شنبه   </option>
                        <option {{($activeTime["from_day"] ?? 1) == 7 ? "selected":"" }} value="7">جمعه</option>
                    </select>
                </div>
                <p>
                    تا روز
                </p>
                <div>
                    <select  wire:model="activeTime.to_day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                        <option {{($activeTime["to_day"] ?? 1) == 1 ? "selected":"" }}  value="1">شنبه</option>
                        <option {{($activeTime["to_day"] ?? 1) == 2 ? "selected":"" }} value="2">یک شنبه</option>
                        <option {{($activeTime["to_day"] ?? 1) == 3 ? "selected":"" }} value="3">دو شنبه </option>
                        <option {{($activeTime["to_day"] ?? 1) == 4 ? 'selected':"" }} value="4"> سه شنبه </option>
                        <option {{($activeTime["to_day"] ?? 1) == 5 ? "selected":"" }} value="5">چهار شنبه</option>
                        <option {{($activeTime["to_day"] ?? 1) == 6 ? "selected":"" }} value="6">پنج شنبه   </option>
                        <option {{($activeTime["to_day"] ?? 1) == 7 ? "selected":"" }} value="7">جمعه</option>
                    </select>
                </div>
                <p>
                    از ساعت
                </p>
                <div>
                    <select  wire:model="activeTime.from_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                        @foreach($times as $time)
                            <option {{($activeTime["from_time"] ?? "00:00") == $time ? "selected":"" }} value="{{$time}}">{{$time}}</option>
                        @endforeach
                    </select>
                </div>
                <p>
                    تا ساعت
                </p>
                <div>
                    <select  wire:model="activeTime.to_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                        @foreach($times as $time)
                            <option {{($activeTime["to_time"] ?? "00:00") == $time ? "selected":"" }} value="{{$time}}">{{$time}}</option>
                        @endforeach
                    </select>
                </div>
            </div>






        </div>
    </div>
    <div class="flex justify-end pt-3">
        <button wire:click="store" type="button" class="p-7 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">ذخیره</button>
    </div>
</div>
