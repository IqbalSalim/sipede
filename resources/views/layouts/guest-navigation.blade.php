<nav x-data="{ open: false }" class="bg-gradient-to-br from-blue-600 to-blue-400">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="flex flex-row items-center justify-between h-16 space-x-3">
            <!-- Logo -->
            <div class="flex flex-row items-center flex-shrink-0 space-x-2">
                <a href="/">
                    <x-application-logo class="block w-auto h-10 text-gray-600 fill-current" />
                </a>
                <div class="invisible font-bold text-white uppercase font-body sm:visible">
                    <h1>sipede</h1>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-4 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                    {{ __('Beranda') }}
                </x-nav-link>
                <x-nav-link :href="route('profil-desa')" :active="request()->routeIs('profil-desa')">
                    {{ __('Profil Desa') }}
                </x-nav-link>
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <x-nav-link :active="request()->routeIs('transparansi.*')" class="cursor-pointer">
                            {{ __('Transparansi') }}
                        </x-nav-link>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('transparansi.guest-realisasi')" :active="request()->routeIs('transparansi.guest-realisasi')">
                            {{ __('Realisasi') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('transparansi.apb')" :active="request()->routeIs('transparansi.apb')">
                            {{ __('APB Desa') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('transparansi.rkp')" :active="request()->routeIs('transparansi.rkp')">
                            {{ __('RKP Desa') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
                <x-nav-link :href="route('warta.warta-kegiatan')" :active="request()->routeIs('warta.*')">
                    {{ __('Warta Kegiatan') }}
                </x-nav-link>
                <x-nav-link :href="route('tentang-kami')" :active="request()->routeIs('tentang-kami')">
                    {{ __('Tentang Kami') }}
                </x-nav-link>
            </div>
            <div class="hidden md:flex">
                @if (Route::has('login'))
                    <div class="flex-row hidden space-x-4 sm:flex">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-4 py-2 text-sm font-medium transition-all duration-200 ease-in-out transform bg-white rounded-lg text-primary focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-opacity-30 hover:bg-primary hover:text-white">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-4 py-2 text-sm font-medium transition-all duration-200 ease-in-out transform bg-white rounded-lg text-primary focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-opacity-30 hover:bg-primary hover:text-white">Log
                                in</a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                class="px-4 py-2 text-sm font-medium capitalize duration-200 transform bg-white rounded-lg bg-opacity-30 focus:ring-secondary focus:ring-opacity-50 focus:outline-none hover:bg-secondary hover:text-white text-secondary ring-2 ring-secondary">Register</a> --}}
                    @endif
                @endauth
            </div>
        </div>



        <!-- Hamburger -->
        <div class="flex items-center -mr-2 sm:hidden">
            <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 text-blue-800 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('welcome')" :active="request()->routeIs('welcome')">
                {{ __('Beranda') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profil-desa')" :active="request()->routeIs('profil-desa')">
                {{ __('Profil Desa') }}
            </x-responsive-nav-link>
            <x-dropdown align="left" width="48">
                <x-slot name="trigger">
                    <x-responsive-nav-link :active="request()->routeIs('transparansi.*')" class="cursor-pointer">
                        {{ __('Transparansi') }}
                    </x-responsive-nav-link>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('transparansi.apb')" :active="request()->routeIs('transparansi.apb')">
                        {{ __('APB Desa') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('transparansi.rkp')" :active="request()->routeIs('transparansi.rkp')">
                        {{ __('RKP Desa') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
            <x-responsive-nav-link :href="route('warta.warta-kegiatan')" :active="request()->routeIs('warta.*')">
                {{ __('Warta Kegiatan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tentang-kami')" :active="request()->routeIs('tentang-kami')">
                {{ __('Tentang Kami') }}
            </x-responsive-nav-link>
        </div>


    </div>
</nav>
