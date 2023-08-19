<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <h4>
        تعریف شماره‌های داخلی
    </h4>
    <p class="text-gray-500 pt-2 pb-2">
        شما در این قسمت می‌توانید داخلی‌های مدنظرتان را تعریف کنید. برای این کار کافیست شماره موبایل یا شماره
        ثابت خود را مقابل هر داخلی وارد نمایید. سپس به روی دکمه ذخیره کلیک کنید.
    </p>

    <div
        class=" p-4 w-full bg-gray-50 border-2 border-gray-300 rounded-lg">


        <div class="flex p-4 pt-2  flex-col  gap-2">

            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۱

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.1.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.1.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="pt-2 w-3/4 pb-2">
                <p class="text-gray-500">
                    پس از تماس با شماره شما (۰۲۱۹۱۰۱۵۸۹۶)، در صورتی که کاربر عدد ۱ را انتخاب کند، تماس به موبايل
                    وارد شده در کادر بالا منتقل می‌شود. در صورتی که شماره‌ای که وارد کرده‌اید پاسخگو نباشد، تماس
                    به شماره‌ای که در کادر بعد وارد کرده‌اید منتقل خواهد شد.
                </p>
            </div>
            <div class="border-b-2 pt-3 mb-3"></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۲

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.2.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.2.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3"></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۳

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.3.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.3.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3 "></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۴

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.4.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.4.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3 "></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۵

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.5.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.5.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3 "></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۶

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.6.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.6.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3 "></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۷

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.7.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.7.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3 "></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۸

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.8.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.8.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>
            <div class="border-b-2 pt-3 mb-3 "></div>
            <div class=" w-3/4 flex item-center gap-4 align-middle items-center">
                <p>
                    داخلی ۹

                    منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.9.main" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <p>
                    در صورت عدم پاسخگویی منتقل شود به
                </p>
                <div>
                    <input wire:model="internals.9.backup" type="text" id="default-input"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
            </div>


        </div>
    </div>
    <div class="flex justify-end pt-3">
        <button wire:click="store"
                class="p-7 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
            ذخیره
        </button>
    </div>
</div>

