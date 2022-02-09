<div>
    <form wire:submit.prevent='update' novalidate>
        @csrf
        <div x-show="modalEdit" class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40">

            <!-- A basic modalEdit dialog with title, body and one button to close -->

            <div @click.away="modalEdit = false" x-show="modalEdit"
                x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                class="flex flex-col w-8/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Kegiatan
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data kegiatan
                        </p>
                    </div>
                </div>

                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <!-- Judul -->
                    <div class="mt-4">
                        <x-label for="bidang" :value="__('Bidang')" />

                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="bidang" id="bidang" wire:model="bidang" wire:change='changeBidang'>
                            <option value="">-- Pilih Bidang --</option>

                            @foreach ($bidangs as $row)
                                <option value="{{ $row->id }}">{{ $row->nama }}</option>
                            @endforeach

                        </select>
                        <span class="text-sm text-danger">
                            @error('bidang')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-4">
                        <x-label for="subbidang" :value="__('Sub Bidang')" />
                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="subbidang" id="subbidang" wire:model="subbidang">
                            <option value="">-- Pilih Sub Bidang --</option>
                            @if ($subbidangs != null)
                                @foreach ($subbidangs as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-sm text-danger">
                            @error('subbidang')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-4">
                        <x-label for="kegiatan" :value="__('Nama Kegiatan')" />

                        <x-input wire:model.defer="kegiatan" id="kegiatan" class="block w-full mt-1 text-sm" type="text"
                            name="kegiatan" autofocus />
                        <span class="text-sm text-danger">
                            @error('kegiatan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-4">
                        <x-label for="kd_rek" :value="__('Kode Rekening Kegiatan')" />

                        <x-input wire:model.defer="kd_rek" id="kd_rek" class="block w-full mt-1 text-sm" type="number"
                            min="1" name="kd_rek" autofocus />
                        <span class="text-sm text-danger">
                            @error('kd_rek')
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
