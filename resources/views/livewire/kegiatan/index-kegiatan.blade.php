<div class="px-4 py-12 md:px-6 lg:px-8" x-data="{ modal: false, modalEdit: false }"
    x-on:close-modal.window="modal = false" x-on:close-modal-edit.window="modalEdit = false">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kegiatan') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-gray-400">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Kegiatan</div>
        </div>
    </x-slot>


    {{-- <livewire:kegiatan.tambah-kegiatan></livewire:kegiatan.tambah-kegiatan> --}}


    <section class="max-w-2xl py-6 mx-auto">
        <h2 class="text-2xl">FAQ</h2>
        <dl class="mt-6 divide-y divide-gray-200">
            <!-- FAQ Item -->
            <div x-data="{ expanded: false }" class="py-3">
                <dt class="text-lg">
                    <!-- Expand/collapse question button -->
                    <button type="button" @click="expanded = !expanded"
                        class="flex items-start justify-between w-full text-left text-gray-400">
                        <span class="font-medium text-gray-900">Lorem ipsum dolor</span>
                        <span class="flex items-center ml-6 h-7">
                            <!-- Expand/collapse icon, toggle classes based on question open state. -->
                            v
                        </span>
                    </button>
                </dt>
                <dd x-show="expanded" x-collapse class="pr-12 mt-2 border border-red-100">
                    <p class="text-base text-gray-500">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </dd>
            </div>

            <!-- FAQ Item 2 -->
            <div x-data="{ expanded: false }" class="py-3">
                <dt class="text-lg">
                    <!-- Expand/collapse question button -->
                    <button type="button" @click="expanded = !expanded"
                        class="flex items-start justify-between w-full text-left text-gray-400">
                        <span class="font-medium text-gray-900">Lorem ipsum dolor</span>
                        <span class="flex items-center ml-6 h-7">
                            <!-- Expand/collapse icon, toggle classes based on question open state. -->
                            v
                        </span>
                    </button>
                </dt>
                <dd x-show="expanded" x-collapse class="pr-12 mt-2 border border-red-100">
                    <p class="text-base text-gray-500">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </dd>
            </div>

            <!-- FAQ Item 3 -->
            <div x-data="{ expanded: false }" class="py-3">
                <dt class="text-lg">
                    <!-- Expand/collapse question button -->
                    <button type="button" @click="expanded = !expanded"
                        class="flex items-start justify-between w-full text-left text-gray-400">
                        <span class="font-medium text-gray-900">Lorem ipsum dolor</span>
                        <span class="flex items-center ml-6 h-7">
                            <!-- Expand/collapse icon, toggle classes based on question open state. -->
                            v
                        </span>
                    </button>
                </dt>
                <dd x-show="expanded" x-collapse class="pr-12 mt-2 border border-red-100">
                    <p class="text-base text-gray-500">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                        nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                        vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                        voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
                        sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                </dd>
            </div>
        </dl>
    </section>


    <div x-data={expanded:false}>
        <button @click="expanded = !expanded">Toggle Content</button>

        <p x-show="expanded" x-collapse>
            dfsdf
            <br>
            fdgdgdgd
            dfgdfg
            dfsdf
            <br>
            fdgdgdgd
            dfgdfg
            dfsdf
            <br>
            fdgdgdgd
            dfgdfg
            dfsdf
            <br>
            fdgdgdgd
            dfgdfg
        </p>
    </div>

    <button class="text-sm btn-primary" wire:click.prevent="tambahModal" @click="modal = true">Tambah
        Kegiatan</button>
    <div x-data={open:false} class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open=!open" class="underline text-primary hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Penyelenggaraan Pemerintah Desa #1
            </button>
        </div>
        <div :class="{'hidden':!open,'block':open}" class="hidden">
            <div x-show="open" x-collapse.duration.1000ms
                class="px-10 py-6 transition-all duration-700 ease-in-out transform bg-white border border-b-0 rounded-b-lg ">
                <div class="w-full overflow-x-auto">
                    <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr class="">
                                <th scope="col"
                                    class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Kode Rekening
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Sub Bidang
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                    <span class="sr-only">Edit</span>
                                    <span class="sr-only">Hapus</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php $no = 1 @endphp
                            @foreach ($kegiatans as $key => $row)
                                @if ($row->a == 1)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                            {{ $no++ }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                            {{ $row->a . ' ' . $row->b . ' ' . $row->kd_rek }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                            {{ $row->sub_nama }}
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                            {{ $row->nama }}
                                        </td>
                                        <td class="px-2 md:px-6">
                                            <div class="flex flex-row items-center space-x-4">
                                                {{-- <button type="button" class="text-sm btn-secondary"
                                        wire:click="$emit('getUsulan', {{ $row->id }})"
                                        @click="modalEdit = true">edit</button> --}}
                                                {{-- <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                        class="text-sm btn-danger">hapus</button> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div x-data={open:false} class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open=!open" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Pelaksanaan Pembangunan Desa #2
            </button>
        </div>
        <div :class="{'hidden':!open,'block':open}" class="hidden px-10 py-6 bg-white border border-b-0 rounded-b-lg">
            <div class="w-full overflow-x-auto">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kode Rekening
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Sub Bidang
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $no = 1 @endphp
                        @foreach ($kegiatans as $key => $row)
                            @if ($row->a == 2)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->a . ' ' . $row->b . ' ' . $row->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->sub_nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->nama }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            {{-- <button type="button" class="text-sm btn-secondary"
                                        wire:click="$emit('getUsulan', {{ $row->id }})"
                                        @click="modalEdit = true">edit</button> --}}
                                            {{-- <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                        class="text-sm btn-danger">hapus</button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div x-data={open:false} class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open=!open" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Pembinaan Kemasyarakatan Desa #3
            </button>
        </div>
        <div :class="{'hidden':!open,'block':open}" class="hidden px-10 py-6 bg-white border border-b-0 rounded-b-lg">
            <div class="w-full overflow-x-auto">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kode Rekening
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Sub Bidang
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $no = 1 @endphp
                        @foreach ($kegiatans as $key => $row)
                            @if ($row->a == 3)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->a . ' ' . $row->b . ' ' . $row->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->sub_nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->nama }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            {{-- <button type="button" class="text-sm btn-secondary"
                                        wire:click="$emit('getUsulan', {{ $row->id }})"
                                        @click="modalEdit = true">edit</button> --}}
                                            {{-- <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                        class="text-sm btn-danger">hapus</button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div x-data="{expanded: false}" class="mt-2 rounded-sm ">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="expanded = ! expanded"
                class="text-blue-500 underline hover:text-blue-700 focus:outline-none" type="button">
                Bidang Pemberdayaan Masyarakat Desa #4
            </button>
        </div>
        <div x-show="expanded" x-collapse.duration.1000ms class="px-10 py-6 bg-white border border-b-0 rounded-b-lg ">
            <div class="w-full overflow-x-auto">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kode Rekening
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Sub Bidang
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $no = 1 @endphp
                        @foreach ($kegiatans as $key => $row)
                            @if ($row->a == 4)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->a . ' ' . $row->b . ' ' . $row->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->sub_nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->nama }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            {{-- <button type="button" class="text-sm btn-secondary"
                                        wire:click="$emit('getUsulan', {{ $row->id }})"
                                        @click="modalEdit = true">edit</button> --}}
                                            {{-- <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                        class="text-sm btn-danger">hapus</button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div x-data={open:false} class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open=!open" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Penanggulangan Bencana, Keadaan Darurat dan Mendesak #5
            </button>
        </div>
        <div :class="{'hidden':!open,'block':open}" class="hidden px-10 py-6 bg-white border border-b-0 rounded-b-lg">
            <div class="w-full overflow-x-auto">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kode Rekening
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Sub Bidang
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php $no = 1 @endphp
                        @foreach ($kegiatans as $key => $row)
                            @if ($row->a == 5)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $no++ }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->a . ' ' . $row->b . ' ' . $row->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->sub_nama }}
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                        {{ $row->nama }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            {{-- <button type="button" class="text-sm btn-secondary"
                                        wire:click="$emit('getUsulan', {{ $row->id }})"
                                        @click="modalEdit = true">edit</button> --}}
                                            {{-- <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                        class="text-sm btn-danger">hapus</button> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
