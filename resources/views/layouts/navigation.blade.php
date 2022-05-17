<nav x-data="{ open: false }" class="bg-gradient-to-br from-blue-600 to-blue-400">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-row items-center h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0 space-x-2">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block w-auto h-10 text-gray-600 fill-current" />
                    </a>
                    <div class="invisible font-bold text-white uppercase font-body sm:visible">
                        <h1>sipede</h1>
                    </div>
                </div>
            </div>

            {{-- Navigation Links --}}
            <div class="flex-1 item-center">
                <div class="items-center justify-center hidden space-x-4 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link :active="request()->routeIs('usulan.*')" class="cursor-pointer">
                                {{ __('Master') }}
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('master.kegiatan')" :active="request()->routeIs('master.kegiatan')">
                                {{ __('Kegiatan') }}
                            </x-dropdown-link>
                            @hasrole('admin')
                                <x-dropdown-link :href="route('master.user')" :active="request()->routeIs('master.user')">
                                    {{ __('User') }}
                                </x-dropdown-link>
                            @endhasrole
                            <x-dropdown-link :href="route('master.visi-misi')" :active="request()->routeIs('master.visi-misi')">
                                {{ __('Visi Misi') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('master.sejarah-desa')" :active="request()->routeIs('master.sejarah-desa')">
                                {{ __('Sejarah Desa') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('master.gambaran-umum')" :active="request()->routeIs('master.gambaran-umum')">
                                {{ __('Gambaran Umum') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('master.perangkat-desa')" :active="request()->routeIs('master.perangkat-desa')">
                                {{ __('Perangkat Desa') }}
                            </x-dropdown-link>
                        </x-slot>

                    </x-dropdown>
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link :active="request()->routeIs('perencanaan.*')" class="cursor-pointer">
                                {{ __('Perencanaan') }}
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('perencanaan.usulan')" :active="request()->routeIs('perencanaan.usulan')">
                                {{ __('Usulan') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('perencanaan.rkp-desa')" :active="request()->routeIs('perencanaan.rkp-desa')">
                                {{ __('RKP Desa') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('perencanaan.rapb-desa')" :active="request()->routeIs('perencanaan.rapb-desa')">
                                {{ __('RAPB Desa') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('perencanaan.apb-desa')" :active="request()->routeIs('perencanaan.apb-desa')">
                                {{ __('APB Desa') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>

                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <x-nav-link :active="request()->routeIs('transparansi.*')" class="cursor-pointer">
                                {{ __('Transparansi') }}
                            </x-nav-link>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('transparansi.realisasi')" :active="request()->routeIs('transparansi.realisasi')">
                                {{ __('Realisasi') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('transparansi.apb-index')" :active="request()->routeIs('transparansi.apb-index')">
                                {{ __('APB Desa') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('transparansi.rkp-index')" :active="request()->routeIs('transparansi.rkp-index')">
                                {{ __('RKP Desa') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('transparansi.status-kegiatan')" :active="request()->routeIs('transparansi.status-kegiatan')">
                                {{ __('Status Kegiatan') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                    <x-nav-link :href="route('warta.warta-index')" :active="request()->routeIs('warta.warta-index')">
                        {{ __('Warta Kegiatan') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out rounded-lg hover:bg-white hover:bg-opacity-30 focus:outline-none focus:border-primary">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    {{-- <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-dropdown align="left" width="48">
                <x-slot name="trigger">
                    <x-responsive-nav-link :active="request()->routeIs('transparansi.*')" class="cursor-pointer">
                        {{ __('Transparansi') }}
                    </x-responsive-nav-link>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('transparansi.apb-index')"
                        :active="request()->routeIs('transparansi.apb-index')">
                        {{ __('APB Desa') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('transparansi.rkp-index')"
                        :active="request()->routeIs('transparansi.rkp-index')">
                        {{ __('RKP Desa') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('transparansi.rka-index')"
                        :active="request()->routeIs('transparansi.rka-index')">
                        {{ __('RKA Desa') }}
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('transparansi.musrenbang-index')"
                        :active="request()->routeIs('transparansi.musrenbang-index')">
                        {{ __('Musrenbang Desa') }}
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
            <x-responsive-nav-link :href="route('warta.warta-index')" :active="request()->routeIs('warta.warta-index')">
                {{ __('Warta Kegiatan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user')" :active="request()->routeIs('user')">
                {{ __('User') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-white">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div> --}}
</nav>
