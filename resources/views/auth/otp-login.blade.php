<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('otp.generate') }}" style="direction: rtl">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('شماره تلفن همراه')" />
            <x-text-input id="email" class="block mt-1 w-full" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
