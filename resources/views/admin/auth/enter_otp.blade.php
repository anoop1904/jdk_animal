<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" style="color: #ffffff; background: #1f2937; padding: 8px 10px; border-radius: 6px;">
                Go to Home
            </a>
        </x-slot>

        <div class="mb-4 text-gray-600">
            <h2 class="text-center">Enter OTP No.</h2>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ url('enter_otp') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="mobile" :value="__('Mobile')" />

                <x-input id="mobile" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" required autofocus />
            </div>

            <div class="text-center justify-end mt-4">
                <x-button>
                    {{ __('Click here') }}
                </x-button>         
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
