<div class="px-4 py-12 md:px-6 lg:px-8" x-data="{ modal: false, modalDetail:false }"
    x-on:close-modal.window="modal = false" x-on:close-modal-detail.window="modal-detail = false">
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

    <div>
        <div class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40" x-show="modal">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div @click.away="modal = false" x-show="modal" x-transition:enter.duration.500ms
                x-transition:leave.duration.400ms
                class="flex flex-col w-10/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Form Tambah RKP Desa
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data RKP Desa
                        </p>
                    </div>
                </div>

                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr class="">
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Bidang
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Jenis Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Lokasi Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Volume
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($rkpdesa != null)
                                <tr>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $rkpdesa->kategori }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $rkpdesa->kegiatan }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $rkpdesa->lokasi }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $rkpdesa->volume . ' ' . $rkpdesa->satuan }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if ($rkpdesa != null)
                        <div class="grid grid-cols-2 gap-3">
                            <div class="mt-2">
                                <x-label for="kode_rekening" :value="__('Kode Rekening')" />

                                <x-input wire:model="kode_rekening" id="kode_rekening" class="block w-full mt-1 text-sm"
                                    type="text" name="kode_rekening" autofocus />
                                <span class="text-sm text-danger">
                                    @error('kode_rekening')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-2">
                                <x-label for="sasaran" :value="__('Sasaran/Manfaat')" />

                                <x-input id="sasaran" wire:model="sasaran" class="block w-full mt-1 text-sm" type="text"
                                    name="sasaran" autofocus />
                                <span class="text-sm text-danger">
                                    @error('sasaran')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-2">
                                <x-label for="waktu" :value="__('Waktu Pelaksanaan')" />

                                <x-input id="waktu" wire:model="waktu" class="block w-full mt-1 text-sm" type="text"
                                    name="waktu" autofocus />
                                <span class="text-sm text-danger">
                                    @error('waktu')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-2">
                                <x-label for="jumlah" :value="__('Jumlah (Rp)')" />

                                <x-input id="jumlah" wire:model="jumlah" class="block w-full mt-1 text-sm" type="number"
                                    min="0" name="jumlah" autofocus />
                                <span class="text-sm text-danger">
                                    @error('jumlah')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-2">
                                <x-label for="sumber" :value="__('Sumber Pembiayaan')" />

                                <x-input id="sumber" wire:model="sumber" class="block w-full mt-1 text-sm" type="text"
                                    name="sumber" autofocus />
                                <span class="text-sm text-danger">
                                    @error('sumber')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Judul -->
                            <div class="mt-2">
                                <x-label for="pola" :value="__('Pola Pelaksanaan')" />

                                <select
                                    class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                                    name="pola" wire:model="pola" id="pola">
                                    <option>-- Pilih Pola Pelaksanaan --</option>
                                    <option value="Swakelola">
                                        Swakelola</option>
                                    <option value="Kerja Sama Antar Desa">Kerja Sama Antar Desa</option>
                                    <option value="Kerja Sama Pihak Ketiga">Kerja
                                        Sama Pihak Ketiga</option>
                                </select>
                                <span class="text-sm text-danger">
                                    @error('pola')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mt-2">
                                <x-label for="rencana" :value="__('Rencana Pelaksanaan Kegiatan')" />

                                <x-input id="rencana" wire:model="rencana" class="block w-full mt-1 text-sm" type="text"
                                    name="rencana" autofocus />
                                <span class="text-sm text-danger">
                                    @error('rencana')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
                <div>
                    <div class="flex items-center justify-between mt-8">
                        <button type="button" wire:click.prevent="simpan" class="text-sm btn-primary">
                            Submit
                        </button>
                        <button type="button" @click="modal = false" wire:click.prevent="resetForm()"
                            class="text-sm btn-secondary">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 py-2 bg-white divide-y-2 rounded-lg shadow-lg divide-gray-2">
        <div class="py-2">
            <a href="{{ route('cetak-rkpdesa') }}" class="text-sm btn-success">Cetak RKP Desa</a>
        </div>
        <div class="py-2">
            <div class="flex flex-row items-center justify-between">
                <div>
                    <select name="paginate" id="paginate" wire:model="paginate"
                        class="block w-full text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
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
                                class="w-3/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Bidang
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Jenis Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Lokasi Kegiatan
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                Status
                            </th>
                            <th scope="col"
                                class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Edit</span>
                                <span class="sr-only">Hapus</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($listrkp as $key => $row)
                            <tr>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $key + 1 }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $row->kategori }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $row->kegiatan }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $row->lokasi }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    @if ($row->jumlah == null)
                                        <span class="text-xs font-medium text-warning">Belum Lengkap</span>
                                    @else
                                        <span class="text-xs font-medium text-success">Lengkap</span>
                                    @endif
                                </td>
                                <td class="px-2 md:px-6">
                                    <div class="flex flex-row items-center space-x-4">
                                        <button type="button" class="text-xs btn-success"
                                            wire:click.prevent="getRowRkp({{ $row->id }})"
                                            @click="modal = true">edit</button>
                                        <button type="button" class="text-xs btn-warning"
                                            wire:click="$emit('getDetail', {{ $row->id }})"
                                            @click="modalDetail = true">detail</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
            {{ $listrkp->links() }}
        </div>
    </div>
</div>
