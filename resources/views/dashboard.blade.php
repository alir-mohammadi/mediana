<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 w-full  border-2 border-gray-300 rounded-lg">
               <livewire:line-status></livewire:line-status>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div
                class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 pl-0 pr-0 w-full   border-2 border-gray-300 rounded-lg">
               <livewire:calls-table></livewire:calls-table>
            </div>
        </div>
    </div>
</x-app-layout>
