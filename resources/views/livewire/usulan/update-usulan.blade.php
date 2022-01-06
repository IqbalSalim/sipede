<div>
    <form wire:submit.prevent='update' novalidate>
        @csrf
        <div class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40" x-show="modalEdit">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div @click.away="modalEdit = false" x-show="modalEdit" x-transition:enter.duration.500ms
                x-transition:leave.duration.400ms
                class="flex flex-col w-8/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Form Usulan Kegiatan
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data usulan kegiatan
                        </p>
                    </div>
                </div>

                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <!-- Judul -->
                    <div class="mt-4">
                        <x-label for="kategori" :value="__('Kategori')" />

                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="kategori" id="kategori" wire:model="kategori">
                            <option>-- Pilih Kategori --</option>
                            <option value="Penyelenggaraan Pemerintahan Desa">Penyelenggaraan Pemerintahan Desa</option>
                            <option value="Pembangunan Desa">Pembangunan Desa</option>
                            <option value="Pembinaan Kemasyarakatan">Pembinaan Kemasyarakatan</option>
                            <option value="Pemberdayaan Kemasyarakatan">Pemberdayaan Kemasyarakatan</option>
                            <option value="Penanggulangan Bencana, Keadaan Darurat dan Mendesak">Penanggulangan Bencana,
                                Keadaan Darurat dan Mendesak</option>
                        </select>
                        <span class="text-sm text-danger">
                            @error('kategori')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-4">
                        <x-label for="kegiatan" :value="__('Usulan/Rencana Kegiatan')" />

                        <x-input wire:model.defer="kegiatan" id="kegiatan" class="block w-full mt-1 text-sm" type="text"
                            name="kegiatan" autofocus />
                        <span class="text-sm text-danger">
                            @error('kegiatan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <!-- lokasi -->
                    <div class="mt-4">
                        <x-label for="lokasi" :value="__('Lokasi')" />

                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="lokasi" id="lokasi" wire:model="lokasi">
                            <option>-- Pilih Lokasi --</option>
                            <option value="Dusun I Mimbaru">Dusun I Mimbaru</option>
                            <option value="Dusun II Sipatana">Dusun II Sipatana</option>
                            <option value="Dusun III Monggiyoto">Dusun III Monggiyoto</option>
                        </select>
                        <span class="text-sm text-danger">
                            @error('lokasi')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mt-8">

                        <button type="submit" class="text-sm btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <button type="button" @click="modalEdit = false" class="text-sm btn-secondary">
                            Close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
