<div class="relative overflow-x-auto rounded">
    <table class="w-full text-sm  text-center text-gray-500 dark:text-gray-400">
        <thead class="text-xs bg-gray-300 text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                شماره پراتور
            </th>
            <th scope="col" class="px-6 py-3">
                نام اپراتور
            </th>
            <th scope="col" class="px-6 py-3">
                وضعیت
            </th>
            <th scope="col" class="px-6 py-3">
                تماس خروجی
            </th>
            <th scope="col" class="px-6 py-3">

            </th>
        </tr>
        </thead>
        <tbody>
        @if($operators instanceof \Illuminate\Pagination\LengthAwarePaginator && !$operators->isEmpty())
            @foreach($operators as $operator)
                <th scope="col" class="px-6 py-3">
                    {{$operator->phone_number}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{$operator->name}}
                </th>
                <th scope="col" class="px-6 py-3 {{$operator->active ? "text-green-400": "text-red-600"}}">
                    {{$operator->active ? "فعال":"غیرفعال"}}
                </th>
                <th scope="col" class="px-6 py-3 {{$operator->outgoing_access ? "text-green-400": "text-red-600"}}">
                    {{$operator->outgoing_access ? "دارد":"ندارد"}}
                </th>
                <th scope="col" class="px-6 py-3">
                    <button wire:click="edit({{$operator->id}})"
                            type="button"
                            class="p-2 focus:outline-none text-green-400 bg-none border-2 border-green-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                        ویرایش
                    </button>
                    <button wire:click="delete({{$operator->id}})"
                            type="button"
                            class="p-2 focus:outline-none text-red-400 bg-none border-2 border-red-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                        حذف
                    </button>
                </th>
            @endforeach
        @else
            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 ">
                <th></th>
                <th></th>

                <th scope="row" class="px-6 py-4 font-medium text-gray-500 whitespace-nowrap dark:text-white">
                    اپراتوری یافت نشد.
                </th>
                <th></th>

            </tr>
        @endif
        </tbody>
    </table>

    <div id="edit-modal" tabindex="-1" aria-hidden="true"
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="edit-modal">
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
                            <label for="email"
                                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">نام</label>
                            <input wire:model.defer="input.name" type="text" id="email"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   placeholder="" required>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">شماره
                                تلفن</label>
                            <input wire:model.defer="input.phone_number" type="text" id="password" placeholder=""
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   required>
                        </div>

                        <div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">فعال</span>
                                <input wire:model.defer="input.active" type="checkbox" value="" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                            </label>
                        </div>
                        <div>
                            <label class="relative inline-flex items-center cursor-pointer ">
                                <span
                                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300 ">تماس خروجی</span>
                                <input wire:model.defer="input.outgoing_access" type="checkbox" value="" class="sr-only peer">
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                            </label>
                        </div>


                        <button wire:click="save" type="submit" data-modal-hide="edit-modal"
                                class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                            افزودن
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    window.livewire.on('showModal', () => {
        console.log('sa');
        $('#edit-modal').modal('show');
    });
</script>
</div>
