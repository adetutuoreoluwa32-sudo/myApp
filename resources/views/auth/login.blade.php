<x-guest-layout>
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold">Welcome Back 👋</h2>
        <p class="text-gray-500 text-sm">Login to continue</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" value="Email" />
            <x-text-input id="email" class="block mt-1 w-full"
                          type="email" name="email"
                          :value="old('email')" required autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password" name="password" required />
        </div>

        <!-- Remember -->
        <div class="block mt-4">
            <label class="flex items-center">
                <input type="checkbox" name="remember" class="rounded">
                <span class="ms-2 text-sm text-gray-600">Remember me</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">
            <a href="{{ route('register') }}" class="text-sm text-blue-500">
                Create account
            </a>

            <x-primary-button>
                Login
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>