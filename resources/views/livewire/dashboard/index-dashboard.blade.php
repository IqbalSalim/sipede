<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
                    <div
                        class="px-8 py-4 font-semibold text-white rounded-lg shadow-lg bg-gradient-to-r from-primary to-blue-300 bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <h2 class="text-4xl">{{ $total_rkp }}</h2>
                        <h3>Total RKP</h3>
                    </div>
                    <div
                        class="px-8 py-4 font-semibold text-white rounded-lg shadow-lg bg-gradient-to-r from-success to-green-300 bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <h2 class="text-4xl">{{ $total_rka }}</h2>
                        <h3>Total RKA</h3>
                    </div>
                    <div
                        class="px-8 py-4 font-semibold text-white rounded-lg shadow-lg bg-gradient-to-r from-indigo-500 to-indigo-300 bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <h2 class="text-4xl">{{ $total_apb }}</h2>
                        <h3>Total APB</h3>
                    </div>
                    <div
                        class="px-8 py-4 font-semibold text-white rounded-lg shadow-lg bg-gradient-to-r from-purple-500 to-purple-300 bg-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <h2 class="text-4xl">{{ $total_musrenbang }}</h2>
                        <h3>Total Musrenbang</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 pt-12 pb-8 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
            <div class="py-2 border-b-2 border-gray-200">
                <h1 class="text-lg font-medium text-default">APB Desa</h1>
            </div>
            <div class="w-full overflow-x-auto md:overflow-hidden">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="w-1/12 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Nama
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Ditambahkan
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($apbs as $key => $apb)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6 whitespace-nowrap">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $apb->nama }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $apb->created_at->format('d M Y') }}
                                </td>

                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="px-4 py-8 mx-auto md:px-6 lg:px-8 max-w-7xl sm:px-6">
        <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
            <div class="py-2 border-b-2 border-gray-200">
                <h1 class="text-lg font-medium text-default">RKP Desa</h1>
            </div>
            <div class="w-full overflow-x-auto md:overflow-hidden">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="w-1/12 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Nama
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Ditambahkan
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($rkps as $key => $rkp)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6 whitespace-nowrap">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $rkp->nama }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $rkp->created_at->format('d M Y') }}
                                </td>

                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="px-4 py-8 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
            <div class="py-2 border-b-2 border-gray-200">
                <h1 class="text-lg font-medium text-default">RKA Desa</h1>
            </div>
            <div class="w-full overflow-x-auto md:overflow-hidden">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="w-1/12 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Nama
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Ditambahkan
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($rkas as $key => $rka)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6 whitespace-nowrap">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $rka->nama }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $rka->created_at->format('d M Y') }}
                                </td>

                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="px-4 py-8 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
            <div class="py-2 border-b-2 border-gray-200">
                <h1 class="text-lg font-medium text-default">Musrenbang Desa</h1>
            </div>
            <div class="w-full overflow-x-auto md:overflow-hidden">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="w-1/12 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Nama
                            </th>
                            <th scope="col"
                                class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Ditambahkan
                            </th>

                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($musrenbangs as $key => $musrenbang)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6 whitespace-nowrap">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $musrenbang->nama }}
                                </td>
                                <td class="px-2 py-4 md:px-6">
                                    {{ $musrenbang->created_at->format('d M Y') }}
                                </td>

                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
