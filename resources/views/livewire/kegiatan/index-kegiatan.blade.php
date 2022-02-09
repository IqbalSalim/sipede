<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8" x-cloak
    x-data="{ modal: false, open1:false, open2:false, open3:false, open4:false, open5:false, modalEdit: false }"
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



    <livewire:kegiatan.tambah-kegiatan></livewire:kegiatan.tambah-kegiatan>
    <livewire:kegiatan.edit-kegiatan></livewire:kegiatan.edit-kegiatan>
    <button class="text-sm btn-primary" @click="modal = true">Tambah
        Kegiatan</button>
    <div class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open1=!open1" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Penyelenggaraan Pemerintah Desa #1
            </button>
        </div>
        <div x-show="open1" class="px-10 py-6 bg-white border border-b-0 rounded-b-lg">
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
                                            <button type="button" class="text-sm btn-secondary"
                                                wire:click="$emit('getKegiatan', {{ $row->id }})"
                                                @click="modalEdit = true">edit</button>
                                            <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                                class="text-sm btn-danger">hapus</button>
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
    <div class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open2=!open2" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Pelaksanaan Pembangunan Desa #2
            </button>
        </div>
        <div x-show="open2" class="px-10 py-6 bg-white border border-b-0 rounded-b-lg">
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
                                            <button type="button" class="text-sm btn-secondary"
                                                wire:click="$emit('getKegiatan', {{ $row->id }})"
                                                @click="modalEdit = true">edit</button>
                                            <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                                class="text-sm btn-danger">hapus</button>
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
    <div class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open3=!open3" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Pembinaan Kemasyarakatan Desa #3
            </button>
        </div>
        <div x-show="open3" class="px-10 py-6 bg-white border border-b-0 rounded-b-lg">
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
                                            <button type="button" class="text-sm btn-secondary"
                                                wire:click="$emit('getKegiatan', {{ $row->id }})"
                                                @click="modalEdit = true">edit</button>
                                            <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                                class="text-sm btn-danger">hapus</button>
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
    <div class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open4=!open4" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Pemberdayaan Masyarakat Desa #4
            </button>
        </div>
        <div x-show="open4" class="px-10 py-6 bg-white border border-b-0 rounded-b-lg">
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
                                            <button type="button" class="text-sm btn-secondary"
                                                wire:click="$emit('getKegiatan', {{ $row->id }})"
                                                @click="modalEdit = true">edit</button>
                                            <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                                class="text-sm btn-danger">hapus</button>
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
    <div class="mt-2 rounded-sm">
        <div class="px-10 py-6 bg-white border border-b-0 rounded-t-lg" id="headingOne">
            <button @click="open5=!open5" class="text-blue-500 underline hover:text-blue-700 focus:outline-none"
                type="button">
                Bidang Penanggulangan Bencana, Keadaan Darurat dan Mendesak #5
            </button>
        </div>
        <div x-show="open5" class="px-10 py-6 bg-white border border-b-0 rounded-b-lg">
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
                                            <button type="button" class="text-sm btn-secondary"
                                                wire:click="$emit('getKegiatan', {{ $row->id }})"
                                                @click="modalEdit = true">edit</button>
                                            <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                                class="text-sm btn-danger">hapus</button>
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
