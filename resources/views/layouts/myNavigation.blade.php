<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('index')">
                        {{ __('Anasayfa') }}
                    </x-nav-link>
                    @if (Route::has('login'))
                            @auth
                                <x-nav-link :href="url('/dashboard')">
                                    {{ __('Yönetici Sayfası') }}
                                </x-nav-link>
                            @else
                                <x-nav-link :href="route('login')">
                                    {{ __('Giriş yap') }}
                                </x-nav-link>
{{--                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>--}}

                                @if (Route::has('register'))
                                <x-nav-link :href="route('register')">
                                    {{ __('üye ol') }}
                                </x-nav-link>
{{--                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>--}}
                                @endif
                            @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
