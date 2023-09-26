<div
     class="fixed top-0 left-0 right-0 z-50  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">بستن</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">افزودن اپراتور</h3>
                <div class="space-y-6" action="#">
                    <div>
                        <label for="type"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع مخاطب</label>
                        <input wire:model.defer="data.type" type="text" id="type"
                               class=" border border-white text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="" disabled>
                    </div>
                    <div>
                        <label for="type"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره مخاطب</label>
                        <input wire:model.defer="data.number" type="text" id="type"
                               class=" border border-white text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="" disabled>
                    </div>


                    <div>
                        <label for="name"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام و نام خانوادگی</label>
                        <input wire:model.defer="input.name" type="text" id="name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="" >
                    </div>
                    <div>
                        <label for="opportunity"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">فرصت فروش</label>
                        <select wire:model="input.opportunity" type="text" id="opportunity"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option {{(data_get($input,'opportunity')) == null ? "selected":"" }} value="">هیچکدام</option>
                            <option {{(data_get($input,'opportunity')) == "بالا" ? "selected":"" }} value="">بالا</option>
                            <option {{(data_get($input,'opportunity')) == "متوسط" ? "selected":"" }} value="">متوسط</option>
                            <option {{(data_get($input,'opportunity')) == "پایین" ? "selected":"" }} value="">پایین</option>
                        </select>
                    </div>
                    <div>
                        <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نوع تماس</label>
                        <select wire:model="input.type" type="text" id="type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option {{(data_get($input,'type')) == null ? "selected":"" }} value="">هیچکدام</option>
                            <option {{(data_get($input,'type')) == "بالا" ? "selected":"" }} value="">بالا</option>
                            <option {{(data_get($input,'type')) == "متوسط" ? "selected":"" }} value="">متوسط</option>
                            <option {{(data_get($input,'type')) == "پایین" ? "selected":"" }} value="">پایین</option>
                        </select>
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">توضیحات</label>
                        <textarea wire:model="input.description" type="" id="description" placeholder=""
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               >
                        </textarea>
                    </div>



                    <button wire:click="save" type="submit" data-modal-hide="authentication-modal"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        افزودن
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
