<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-30 h-20 text-gray-500 fill-current" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="text-primary border-blue-300 rounded shadow-sm focus:border-primary focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-primary">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-row space-x-2 items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="text-sm text-primary font-medium hover:text-blue-900"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit" class="text-sm btn-primary">Log in</button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
