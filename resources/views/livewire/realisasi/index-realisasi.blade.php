<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
    <div class="px-4 py-2 bg-white rounded-lg shadow-lg" x-cloak x-data="{ modal: false, modalEdit: false, modalDetail: false, modalStatus: false, open1: true, open2: false, open3: false, open4: false, open5: false, }"
        x-on:close-modal.window="modal = false" x-on:close-modal-edit.window="modalEdit = false"
        x-on:open-modal-status.window="modalStatus = true" x-on:close-modal-status.window="modalStatus = false">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Realisasi Kegiatan') }}
            </h2>
            <div class="flex flex-row space-x-1 text-sm text-gray-400">
                <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
                <div>-</div>
                <div>Realisasi Kegiatan</div>
            </div>
        </x-slot>

        <livewire:realisasi.create-realisasi></livewire:realisasi.create-realisasi>
        <livewire:realisasi.update-realisasi></livewire:realisasi.update-realisasi>




        <div class="flex flex-row items-end justify-between mt-2">
            <table class="text-sm">
                <tr>
                    <td>Bidang</td>
                    <td>:</td>
                    <td class="font-medium">
                        @if ($infoKegiatan !== null && $infoKegiatan !== '')
                            {{ $infoKegiatan->kegiatan->subbidang->bidang->nama }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="pr-6">Sub Bidang</td>
                    <td class="pr-3">:</td>
                    <td class="font-medium">
                        @if ($infoKegiatan !== null && $infoKegiatan !== '')
                            {{ $infoKegiatan->kegiatan->subbidang->nama }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Kegiatan</td>
                    <td>:</td>
                    <td class="font-medium">
                        @if ($infoKegiatan !== null && $infoKegiatan !== '')
                            {{ $infoKegiatan->kegiatan->nama }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td class="font-medium capitalize">
                        @if ($infoKegiatan !== null && $infoKegiatan !== '')
                            {{ $infoKegiatan->status_kegiatan }}
                        @endif
                    </td>
                </tr>
            </table>

        </div>
        <div class="flex flex-row items-end justify-between mt-2">

            <div class="flex flex-row flex-1 space-x-4">
                <div>
                    <x-label for="paginate" :value="__('Item')" />
                    <select name="paginate" id="paginate" wire:model="paginate"
                        class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="w-32">
                    <x-label for="tahun" :value="__('Tahun')" />
                    <select name="tahun" id="tahun" wire:model="tahun"
                        class="w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        @foreach ($tahuns as $item)
                            <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-label for="kegiatan" :value="__('Kegiatan')" />
                    <select name="kegiatan" id="kegiatan" wire:model="kegiatan"
                        class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">-- Pilih Kegiatan --</option>

                        @if ($usulans !== null)
                            @foreach ($usulans as $item)
                                <option value="{{ $item->id }}">{{ $item->kegiatan->nama }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>


                <div class="md:w-3/12">
                    <x-label for="search" :value="__('Cari Rincian')" />
                    <x-input wire:model="search" id="search" class="block w-full mt-1 text-sm" placeholder="Cari..."
                        type="text" name="search" autofocus />
                </div>
            </div>
            <div>
                @if ($infoKegiatan !== null && $infoKegiatan !== '')
                    @can('olah realisasi')
                        <button class="text-sm btn-primary" wire:click="$emit('getKegiatan', {{ $infoKegiatan->id }})"
                            @click="modal = true">Tambah Realisasi</button>
                    @endcan
                @endif
            </div>


        </div>



        <div class="w-full overflow-x-auto md:overflow-hidden">
            <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr class="">
                        <th scope="col"
                            class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            #
                        </th>
                        <th scope="col"
                            class="w-8/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Rincian
                        </th>
                        <th scope="col"
                            class="w-4/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Harga (Rp)
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
                    @foreach ($kegiatans as $row)
                        <tr>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $no++ }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->uraian }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->harga }}
                            </td>
                            <td class="px-2 md:px-6">
                                <div class="flex flex-row items-center space-x-4">
                                    @can('olah realisasi')
                                        <button type="button" class="text-xs btn-secondary"
                                            wire:click="$emit('getRealisasi', {{ $row->id }})"
                                            @click="modalEdit = true">edit</button>
                                        <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                            class="text-xs btn-danger">hapus</button>
                                    @endcan
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $kegiatans->links() }} --}}
            @can('olah realisasi')
                <div class="flex flex-col items-center my-2">
                    @if (count($kegiatans) != 0)
                        @if ($kegiatans[0]->usulan->status_kegiatan != 'terlaksana')
                            <div class="mt-2">
                                <button wire:click="updateStatusKegiatan({{ $kegiatans[0]->usulan_id }}, 'terlaksana')"
                                    class="text-sm btn-success">Ubah Status Kegiatan Menjadi Terlaksana</button>
                            </div>
                        @else
                            <div class="mt-2">
                                <button
                                    wire:click="updateStatusKegiatan({{ $kegiatans[0]->usulan_id }}, 'belum terlaksana')"
                                    class="text-sm btn-warning">Ubah Status Kegiatan Menjadi Belum Terlaksana</button>
                            </div>
                        @endif
                    @endif
                </div>
            @endcan

        </div>


    </div>
</div>
