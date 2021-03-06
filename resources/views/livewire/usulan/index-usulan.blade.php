<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8" x-cloak x-data="{ modal: false, modalEdit: false, modalDetail: false, modalStatus: false, open1: true, open2: false, open3: false, open4: false, open5: false, usulKembali: false }"
    x-on:close-modal.window="modal = false" x-on:close-modal-edit.window="modalEdit = false"
    x-on:open-modal-status.window="modalStatus = true" x-on:close-modal-status.window="modalStatus = false"
    x-on:close-usul-kembali.window="usulKembali = false">
    <div class="px-4 py-2 bg-white rounded-lg shadow-lg">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Usulan Kegiatan') }}
            </h2>
            <div class="flex flex-row space-x-1 text-sm text-gray-400">
                <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
                <div>-</div>
                <div>Usulan Kegiatan</div>
            </div>
        </x-slot>

        <livewire:usulan.create-usulan></livewire:usulan.create-usulan>
        <livewire:usulan.update-usulan></livewire:usulan.update-usulan>
        <livewire:usulan.detail-usulan></livewire:usulan.detail-usulan>
        <livewire:usulan.status-sesuai></livewire:usulan.status-sesuai>
        <livewire:usulan.usul-kembali></livewire:usulan.usul-kembali>





        <div class="flex flex-row justify-between py-2 border-b-2 border-gray-200">
            <div>
                @can('olah usulan')
                    <button class="text-sm btn-primary" @click="modal = true">Tambah Usulan</button>
                @endcan
            </div>
            <div>
                <form action="{{ url('export-usulan') }}" method="POST" novalidate>
                    @csrf
                    <input type="hidden" name="tahun" value="{{ $tahun }}">
                    <button type="submit" class="text-sm btn-success">Export Excel</button>
                </form>
            </div>

        </div>
        <div class="mt-2">
            <div class="flex flex-row items-end justify-between space-x-6">
                <div class="flex flex-row space-x-4">
                    <div>
                        <x-label for="paginate" :value="__('Item')" />
                        <select name="paginate" id="paginate" wire:model="paginate"
                            class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div>
                        <x-label for="tahun" :value="__('Tahun')" />
                        <select name="tahun" id="tahun" wire:model="tahun"
                            class="w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            @foreach ($tahuns as $item)
                                <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-row space-x-4">
                    <div>
                        <x-label for="bidang" :value="__('Bidang')" />
                        <select name="bidang" id="bidang" wire:model="bidang"
                            class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="">-- Semua Bidang --</option>
                            @foreach ($bidangs as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="md:w-6/12">
                        <x-label for="search" :value="__('Nama Kegiatan')" />
                        <x-input wire:model="search" id="search" class="block w-full mt-1 text-sm" placeholder="Cari..."
                            type="text" name="search" autofocus />
                    </div>
                </div>
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
                            class="w-3/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Sub Bidang
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Kegiatan
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Lokasi
                        </th>
                        @unlessrole('sekretaris')
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Status
                            </th>
                        @endunlessrole

                        @role('sekretaris')
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Status
                            </th>

                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        @endunlessrole
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
                                {{ $row->kegiatan->subbidang->nama }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->kegiatan->nama }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->lokasi }}
                            </td>
                            @unlessrole('sekretaris')
                                <td @class([
                                    'px-4 py-3 text-xs font-medium capitalize md:px-6',
                                    'text-warning' => $row->status == 'verifikasi',
                                    'text-success' => $row->status == 'sesuai',
                                    'text-danger' => $row->status == 'tidak sesuai',
                                ]) class="">
                                    {{ $row->status }}
                                </td>
                            @endunlessrole
                            @role('sekretaris')
                                <td>
                                    <select wire:model.defer="status.{{ $row->id }}"
                                        wire:change.defer='changeStatus({{ $row->id }})' @class([
                                            'block w-full mt-1 text-xs capitalize border-gray-300 rounded-md shadow-sm appearance-none focus:border-blue-300  focus:ring focus:ring-blue-200 focus:ring-opacity-50',
                                            'text-warning font-medium' => $row->status == 'verifikasi',
                                            'text-success font-medium' => $row->status == 'sesuai',
                                            'text-danger font-medium' => $row->status == 'tidak sesuai',
                                        ])>
                                        <option value="verifikasi" class="font-medium text-warning">Verifikasi
                                        </option>
                                        <option value="sesuai" class="font-medium text-primary">Sesuai</option>
                                        <option value="tidak sesuai" class="font-medium text-danger">
                                            Tidak
                                            Sesuai
                                        </option>
                                    </select>
                                </td>

                                <td class="px-2 md:px-6">
                                    <div class="flex flex-row items-center space-x-4">
                                        <button type="button" class="text-xs btn-primary"
                                            wire:click="$emit('getDetailUsulan', {{ $row->id }})"
                                            @click="modalDetail = true">detail</button>
                                        <button type="button" class="text-xs btn-secondary"
                                            wire:click="$emit('getUsulan', {{ $row->id }})"
                                            @click="modalEdit = true">edit</button>
                                        <button wire:click="alertConfirm({{ $row->id }})" type="button"
                                            class="text-xs btn-danger">hapus</button>
                                    </div>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kegiatans->links() }}
        </div>


    </div>


    <div class="px-4 py-2 mt-4 bg-white rounded-lg shadow-lg">
        <div class="py-2 border-b-2 border-gray-200">
            <h3 class="text-lg font-medium text-center text-warning">Kegiatan Yang Belum Terlaksana</h3>
        </div>
        <div class="mt-2">
            <div class="flex flex-row items-end justify-between space-x-6">

                <div>
                    <x-label for="paginate" :value="__('Item')" />
                    <select name="paginate" id="paginate" wire:model="paginate1"
                        class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div>
                    <x-label for="tahun" :value="__('Tahun')" />
                    <select name="tahun" id="tahun" wire:model="tahun1"
                        class="w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        @foreach ($tahuns as $item)
                            <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                        @endforeach
                    </select>
                </div>

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
                            class="w-3/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Sub Bidang
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Kegiatan
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Lokasi
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Status
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
                    @foreach ($belumTerlaksana as $row)
                        <tr>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $no++ }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->kegiatan->subbidang->nama }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->kegiatan->nama }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->lokasi }}
                            </td>

                            <td class="px-4 py-3 text-xs font-medium capitalize text-danger md:px-6">
                                {{ $row->status_kegiatan }}
                            </td>

                            <td class="px-2 md:px-6">
                                <div class="flex flex-row items-center space-x-4">
                                    <button type="button" class="text-xs btn-primary"
                                        wire:click="$emit('getDetailUsulan', {{ $row->id }})"
                                        @click="modalDetail = true">detail</button>
                                    @can('olah usulan')
                                        <button type="button" class="text-xs btn-secondary"
                                            wire:click="$emit('getUsulKembali', {{ $row->id }})"
                                            @click="usulKembali = true">Usulkan</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $belumTerlaksana->links() }}
        </div>
    </div>
</div>
