<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end pt-3">
                <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
                        class="p-7 focus:outline-none text-white bg-green-500 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-500 dark:focus:ring-green-800">
                    افزودن
                </button>
            </div>
            <livewire:operators></livewire:operators>

        </div>
    </div>


    <!-- Main modal -->
  <livewire:add-operator></livewire:add-operator>


</x-app-layout>
