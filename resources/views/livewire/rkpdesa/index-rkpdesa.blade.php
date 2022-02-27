<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8" x-cloak x-data="{ modal: false, modalDetail:false }"
    x-on:close-modal.window="modal = false" x-on:close-modal-detail.window="modal-detail = false">
    <div class="px-4 py-2 bg-white rounded-lg shadow-lg">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('RKP Desa') }}
            </h2>
            <div class="flex flex-row space-x-1 text-sm text-gray-400">
                <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
                <div>-</div>
                <div>RKP Desa</div>
            </div>
        </x-slot>

        <livewire:rkpdesa.detail-rkpdesa></livewire:rkpdesa.detail-rkpdesa>
        <livewire:rkpdesa.edit-rkpdesa></livewire:rkpdesa.edit-rkpdesa>



        <div class="flex flex-row py-2 space-x-8 border-b-2 border-gray-200">
            <div>
                <form action="{{ url('export-rkpdesa') }}" method="POST" novalidate>
                    @csrf
                    <input type="hidden" name="tahun" value="{{ $tahun }}">
                    <input type="hidden" name="bidang" value="{{ $bidang }}">
                    <button type="submit" class="text-sm btn-success">Export Excel</button>
                </form>
            </div>
            <div class="flex flex-row items-end justify-end flex-1 space-x-6">
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

                <div class="md:w-3/12">
                    <x-label for="search" :value="__('Nama Kegiatan')" />
                    <x-input wire:model="search" id="search" class="block w-full mt-1 text-sm" placeholder="Cari..."
                        type="text" name="search" autofocus />
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
                        @cannot('crud usulan')
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Status
                            </th>
                        @endcannot

                        @can('crud usulan')
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Status
                            </th>

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
                            @if ($row->jumlah == null || ($row->jumlah = ''))
                                <td class="px-4 py-3 text-xs font-medium capitalize text-danger md:px-6">
                                    belum lengkap
                                </td>
                            @else
                                <td class="px-4 py-3 text-xs font-medium capitalize text-success md:px-6">
                                    lengkap
                                </td>
                            @endif
                            @can('crud usulan')
                                <td class="px-2 md:px-6">
                                    <div class="flex flex-row items-center space-x-4">
                                        <button type="button" class="text-xs btn-primary"
                                            wire:click="$emit('getDetailRkp', {{ $row->id }})"
                                            @click="modalDetail = true">detail</button>
                                        <button type="button" class="text-xs btn-secondary"
                                            wire:click="$emit('getEditRkp', {{ $row->id }})"
                                            @click="modal = true">edit</button>
                                    </div>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $kegiatans->links() }}
        </div>
    </div>
</div>
