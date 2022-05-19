<div>
    <div class="bg-gray-100" x-cloak x-data="{ modalShow: false }">
        <div class="px-4 py-12 md:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
                <div class="block py-2 text-lg font-medium text-center border-b text-primary">
                    Kegiatan Terlaksana
                </div>
                <div class="mt-4">
                    <div class="flex flex-row items-end justify-between space-x-6">
                        <div class="flex flex-row space-x-4">
                            <div>
                                <x-label for="paginate" :value="__('Item')" />
                                <select name="paginate" id="paginate" wire:model="paginateTerlaksana"
                                    class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                            <div>
                                <x-label for="tahun" :value="__('Tahun')" />
                                <select name="tahun" id="tahun" wire:model="tahunTerlaksana"
                                    class="w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @foreach ($tahunTerlaksanas as $item)
                                        <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4">
                            <div>
                                <x-label for="bidang" :value="__('Bidang')" />
                                <select name="bidang" id="bidang" wire:model="bidangTerlaksana"
                                    class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">-- Semua Bidang --</option>
                                    @foreach ($bidangTerlaksanas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:w-6/12">
                                <x-label for="searchTerlaksana" :value="__('Nama Kegiatan')" />
                                <x-input wire:model="searchTerlaksana" id="searchTerlaksana"
                                    class="block w-full mt-1 text-sm" placeholder="Cari..." type="text"
                                    name="searchTerlaksana" autofocus />
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
                            @foreach ($terlaksana as $row)
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

                                    <td class="px-4 py-3 text-xs font-medium capitalize text-success md:px-6">
                                        {{ $row->status_kegiatan }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            <button type="button" class="text-xs btn-primary"
                                                wire:click="$emit('getDetailUsulan', {{ $row->id }})"
                                                @click="modalDetail = true">detail</button>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $terlaksana->links() }}
                </div>
            </div>

            <div class="px-4 py-4 mt-8 bg-white rounded-lg shadow-lg">
                <div class="block py-2 text-lg font-medium text-center border-b text-warning">
                    Kegiatan Belum Terlaksana
                </div>
                <div class="mt-4">
                    <div class="flex flex-row items-end justify-between space-x-6">
                        <div class="flex flex-row space-x-4">
                            <div>
                                <x-label for="paginateBelumTerlaksana" :value="__('Item')" />
                                <select name="paginateBelumTerlaksana" id="paginateBelumTerlaksana"
                                    wire:model="paginateBelumTerlaksana"
                                    class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                            <div>
                                <x-label for="tahunBelumTerlaksana" :value="__('Tahun')" />
                                <select name="tahunBelumTerlaksana" id="tahunBelumTerlaksana"
                                    wire:model="tahunBelumTerlaksana"
                                    class="w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    @foreach ($tahunBelumTerlaksanas as $item)
                                        <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4">
                            <div>
                                <x-label for="bidangBelumTerlaksana" :value="__('Bidang')" />
                                <select name="bidangBelumTerlaksana" id="bidangBelumTerlaksana"
                                    wire:model="bidangBelumTerlaksana"
                                    class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">-- Semua Bidang --</option>
                                    @foreach ($bidangBelumTerlaksanas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:w-6/12">
                                <x-label for="searchBelumTerlaksana" :value="__('Nama Kegiatan')" />
                                <x-input wire:model="searchBelumTerlaksana" id="searchBelumTerlaksana"
                                    class="block w-full mt-1 text-sm" placeholder="Cari..." type="text"
                                    name="searchBelumTerlaksana" autofocus />
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
    </div>
</div>
