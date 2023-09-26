<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('otp.getlogin') }}" style="direction: rtl">
        @csrf
        <input type="hidden" name="user_id" value="{{$user_id}}" />
        <!-- Email Address -->
        <div>
            <x-input-label for="otp" :value="__('رمزیکبار مصرف')" />
            <x-text-input id="otp" class="block mt-1 w-full" name="otp" :value="old('otp')" required autofocus />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>


        <!-- Remember Me -->

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-3">
                {{ __('ارسال') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-center mt-4">

            <a class="btn btn-link text-blue-400" href="{{ route('login') }}">
                ورود با رمز عبور
            </a>
        </div>
    </form>
</x-guest-layout>

