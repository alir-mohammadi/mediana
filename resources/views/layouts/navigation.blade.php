<nav class="bg-white border-gray-200 dark:bg-gray-900 mb-4">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="91" height="72" viewBox="0 0 91 72" fill="none">
                    <path
                        d="M30.7212 48.0863H32.862V24.2385H30.7212V48.0863ZM58.5471 24.2385V48.0863H60.6879V24.2385H58.5471ZM44.6341 41.198H46.7749V26.359H44.6341V41.198Z"
                        fill="#9BC8BE"/>
                </svg>
            </div>
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">مدیانا</span>
        </a>
        <div class="flex items-center md:order-2">
            <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full"
                     src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( Auth::user()->email ) ) )."?s=50"}}"
                     alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div
                class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="self-center block text-sm text-gray-900 dark:text-white">{{Auth::user()->name}}</span>
                    <span
                        class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{Auth::user()->email}}</span>
                </div>
                <ul class="py-2" aria-labelledby="user-menu-button">
                    <li>
                        <a href="#"
                           class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">خروج</a>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

    </div>
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 pb-0  border-b-2 ">
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 " id="navbar-user">
            <ul class="text-center flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row  gap-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-700 md:dark:bg-gray-900 dark:border-gray-700 ">
                @php
                    $active = "block mb-3 py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-green-700 md:p-0 md:dark:text-blue-500 border-b-green-700";
                    $deActive = " block mb-3 py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-green-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700";
                $border = "border-b-2 border-green-700";
                @endphp
                <li class=" {{request()->routeIs('dashboard') ? $border :"" }}   pr-2 pl-2">
                    <a href="{{route('dashboard')}}"
                       class="{{request()->routeIs('dashboard') ? $active : $deActive}}"
                       aria-current="page">وضعیت تماس‌ها</a>
                </li>
                <li class="{{request()->routeIs('phone-settings') ? $border :"" }}  pr-2 pl-2">
                    <a href="{{route('phone-settings')}}"
                       class="{{request()->routeIs('phone-settings') ? $active : $deActive}}">تنظیمات تلفن گویا</a>
                </li>
                <li class="{{request()->routeIs('internal-settings') ? $border :"" }}  pr-2 pl-2">
                    <a href="{{route('internal-settings')}}"
                       class="{{request()->routeIs('internal-settings') ? $active : $deActive}}">تنظیمات شماره داخلی</a>
                </li>
                <li class="{{request()->routeIs('timesheet-settings') ? $border :"" }}  pr-2 pl-2">
                    <a href="{{route('timesheet-settings')}}"
                       class="{{request()->routeIs('timesheet-settings') ? $active : $deActive}}">تنظیمات زمان‌بندی</a>
                </li>
                <li class="{{request()->routeIs('contacts') ? $border :"" }}  pr-2 pl-2">
                    <a href="{{route('contacts')}}"
                       class="{{request()->routeIs('contacts') ? $active : $deActive}}">مخاطبین</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
