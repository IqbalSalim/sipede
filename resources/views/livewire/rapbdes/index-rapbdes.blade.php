<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
    <div class="px-4 py-2 bg-white rounded-lg shadow-lg" x-cloak
        x-data="{ modal: false, modalEdit: false, modalDetail: false, modalStatus: false, open1:true, open2:false, open3:false, open4:false, open5:false, }"
        x-on:close-modal.window="modal = false" x-on:close-modal-edit.window="modalEdit = false">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Usulan Kegiatan') }}
            </h2>
            <div class="flex flex-row space-x-1 text-sm text-gray-400">
                <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
                <div>-</div>
                <div>Rancangan APB Desa</div>
            </div>
        </x-slot>

        <livewire:rapbdes.create-rapbdes></livewire:rapbdes.create-rapbdes>
        {{-- <livewire:usulan.update-usulan></livewire:usulan.update-usulan> --}}






        <div class="flex flex-row py-2 space-x-8 border-b-2 border-gray-200">
            <div class="self-end">
                <button class="text-sm btn-primary" @click="modal = true">Tambah Pendapatan</button>
            </div>
            <div class="flex flex-row items-end justify-end flex-1 space-x-6">

            </div>
        </div>
        <div class="flex flex-row items-center justify-between py-2">
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

            <div class="md:w-3/12">
                <x-label for="search" :value="__('Nama Kegiatan')" />
                <x-input wire:model="search" id="search" class="block w-full mt-1 text-sm" placeholder="Cari..."
                    type="text" name="search" autofocus />
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
                            Kategori
                        </th>
                        <th scope="col"
                            class="w-3/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Kode Rekening
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Uraian
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Anggaran
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Sumber Dana
                        </th>
                        @can('crud usulan')
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php $no = 1 @endphp
                    @foreach ($pendapatans as $row)
                        <tr>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $no++ }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->kategoriPendapatan->kategori }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->kategoriPendapatan->kd_rek }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->uraian }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->anggaran }}
                            </td>
                            <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                {{ $row->sumber_dana }}
                            </td>

                            @can('crud usulan')
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
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $pendapatans->links() }}
        </div>


    </div>
</div>
