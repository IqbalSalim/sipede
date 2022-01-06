<div class="px-4 py-12 md:px-6 lg:px-8" x-data="{ modal: false, modalEdit: false }"
    x-on:close-modal.window="modal = false" x-on:close-modal-edit.window="modalEdit = false">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Rekapan Usulan') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-gray-400">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Rekapan Usulan</div>
        </div>
    </x-slot>



    <div class="px-4 py-2 bg-white divide-y-2 rounded-lg shadow-lg divide-gray-2">
        <div class="flex flex-row justify-between py-2">
            <button wire:click.prevent='update' class="text-sm btn-primary">Simpan Perubahan</button>
            <a href="{{ route('cetak-rekap') }}" class="text-sm btn-success">Cetak Usulan</a>
        </div>
        <div class="py-2">
            <div class="flex flex-row items-center justify-between">
                <div>
                    <select name="paginate" id="paginate" wire:model="paginate"
                        class="block w-full text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="md:w-3/12">
                    <x-input wire:model="search" id="search" class="block w-full text-sm" placeholder="Search..."
                        type="text" name="search" autofocus />
                </div>
            </div>
            <div class="w-full overflow-x-auto">
                <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-50">
                        <tr class="">
                            <th scope="col"
                                class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                #
                            </th>
                            <th scope="col"
                                class="w-2/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Kategori
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Usulan/Rencana Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Lokasi Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Perkiraan Volume
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Satuan
                            </th>
                            <th scope="col"
                                class="w-2/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Mendukung SDGs Desa Ke
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($usulan as $key => $row)
                            <tr>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    {{ $row->kategori }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    {{ $row->kegiatan }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    {{ $row->lokasi }}
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    <x-input wire:model.defer="volume.{{ $row->id }}" id="volume"
                                        class="block w-full mt-1 text-sm" type="text" name="volume" autofocus />
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    <x-input wire:model.defer="satuan.{{ $row->id }}" id="volume"
                                        class="block w-full mt-1 text-sm" type="text" name="volume" autofocus />
                                </td>
                                <td class="px-4 py-3 text-sm text-gray-500 md:px-6">
                                    <x-input wire:model.defer="sdgs.{{ $row->id }}" id="sdgs"
                                        class="block w-full mt-1 text-sm" type="text" name="sdgs" autofocus />
                                </td>

                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
            {{ $usulan->links() }}
        </div>
    </div>
</div>
