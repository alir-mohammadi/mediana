<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class=" p-4 w-full bg-gray-50 border-2 border-gray-300 rounded-lg">
                <div class="flex items-center   p-4 pb-8">
                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-1" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">تلفن
                        گویا پیش‌فرض</label>

                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider"
                            class=" mr-4 text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800 pt-3 pb-3 mb-1"
                            type="button">فایل گویا پیش‌فرض
                        <svg class="w-2.5 h-2.5 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownDivider"
                         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <a href="#"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Separated
                                link</a>
                        </div>
                    </div>

                    <button type="button"
                            class="text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                        پخش فایل انتخاب‌شده
                    </button>
                    <button type="button"
                            class="text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                        لیست همه‌ی پیام‌های پیش‌فرض
                    </button>

                </div>
                <div class="border-b-2 flex items-center p-4 pt-2 text-gray-500">
                    <p>
                        برای فعال کردن تلفن گویا می‌توانید یا از پیام‌های پیش‌فرض انتخاب کنید و یا از بخش زیر فایل
                        اختصاصی خود را بارگذاری کنید.
                    </p>
                </div>
                <div class="flex items-center p-4 pt-8">
                    <input checked id="default-radio-2" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="default-radio-2" class="mr-2 text-sm font-medium text-gray-900 dark:text-gray-300">تلفن
                        گویا اختصاصی</label>
                </div>

                <div class="flex p-4 pt-2 border-2 rounded-lg flex-col">

                    <div class="p-4 text-gray-500">
                        <ul class="list-disc">
                            <li>حداکثر حجم فایل می‌تواند ۱ مگابایت باشد.</li>
                            <li>شما می‌توانید از سایت
                                <a href="https://g711.org" class="text-green-400">
                                    https://g711.org
                                </a> برای تبدیل فایل صوتی استفاده کنید.</li>
                            <li>کاربر گرامی لطفا فایل صوتی خود را با مشخصات (Bit Resolution: 16, Sample Rate : 8000, Audio Channels: Mono) بارگذاری نمایید.</li>
                        </ul>

                    </div>
                    <div class="flex w-2/3">
                    <p class="flex-1">
                        فایل منوی صوتی
                    </p>
                    <button type="button"
                            class="flex-1 text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                        انتخاب فایل صوتی
                    </button>
                        <button type="button"
                            class=" flex-1 text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                            پخش فایل کنونی
                    </button>
                    </div>
                    <div class="flex w-2/3">
                        <p class="flex-1">
                            فایل صوتی ساعات غیر کاری
                        </p>
                        <button type="button"
                                class=" flex-1 text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                            انتخاب فایل صوتی
                        </button>
                        <button type="button"
                                class=" flex-1 text-green-500 hover:text-white border border-green-500 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800">
                            پخش فایل کنونی
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex justify-end pt-3">
                <button type="button" class="p-7 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">ذخیره</button>
            </div>
        </div>
    </div>

</x-app-layout>
