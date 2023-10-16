<x-guest-layout>
    <livewire:feed-back-link :callId="$callId"></livewire:feed-back-link>

</x-guest-layout>
@livewireScripts
<script>
    window.livewire.on('toastMessage', (type, message) => {
       window.alert(message.message)
    });
</script>
