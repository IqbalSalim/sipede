<div>
    <form wire:submit.prevent="store" novalidate>
        @csrf
        <div x-show="modal" class="fixed inset-0 z-50 flex justify-center w-full py-20 bg-black bg-opacity-40">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div @click.away="modal = false" x-show="modal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="flex flex-col w-6/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Realisasi Kegiatan
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data realisasi kegiatan
                        </p>
                    </div>
                </div>


                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <!-- Rincian -->
                    <div class="mt-4">
                        <x-label for="rincian" :value="__('Rincian')" />

                        <x-input wire:model.defer="rincian" id="rincian" class="block w-full mt-1" type="text"
                            name="rincian" autofocus />
                        <span class="text-sm text-danger">
                            @error('rincian')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <!-- Harga-->
                    <div class="mt-4">
                        <x-label for="harga" :value="__('Harga')" />

                        <x-input wire:model.defer="harga" id="harga" class="block w-full mt-1" type="text" name="harga"
                            autofocus />
                        <span class="text-sm text-danger">
                            @error('harga')
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
                        <button type="button" @click="modal = false" class="text-sm btn-secondary">
                            Close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
