<div>
    <form wire:submit.prevent='simpan' novalidate>
        @csrf
        <div x-show="modal" class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div x-show="modal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
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
                                    Volume
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($rkpdesa != null)
                                <tr>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $rkpdesa->kegiatan->subbidang->nama }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $rkpdesa->kegiatan->nama }}
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
                        <button type="submit" class="text-sm btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <button type="button" @click="modal = false" wire:click.prevent="resetForm()"
                            class="text-sm btn-secondary">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
