<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

               <livewire:line-status></livewire:line-status>

        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <livewire:calls-table></livewire:calls-table>
        </div>
    </div>

        <livewire:feedback></livewire:feedback>


    @push('scripts')
        <script>
            window.livewire.on('showModal-feedback', () => {
                modalFeedback = new window.Modal(document.getElementById('feedback-modal'));
                console.log(modalFeedback);
                modalFeedback.show();
                console.log(modalFeedback);
            });
            window.livewire.on('hideModal-feedback', () => {
                modal = new window.Modal(document.getElementById('feedback-modal'));
                document.querySelector(".z-40").remove();
                modal.hide();
            });
        </script>
    @endpush
</x-app-layout>
