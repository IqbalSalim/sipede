<div>

    <form wire:submit.prevent='store'>
        @csrf
        <div class="fixed inset-0 z-50 flex justify-center w-full py-16 bg-black bg-opacity-40" x-show="modalCreate">

            <!-- A basic modalCreate dialog with title, body and one button to close -->

            <div x-show="modalCreate" x-transition:enter.duration.500ms x-transition:leave.duration.400ms
                @click.away="modalCreate = false"
                class="flex flex-col w-11/12 h-auto p-4 mx-2 text-left transition-all duration-1000 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl md:w-10/12 lg:w-6/12">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Form RKA Desa
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data RKA Desa
                        </p>
                    </div>
                </div>

                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <!-- Name -->
                    <div class="mt-4">
                        <x-label for="nama" :value="__('Nama')" />

                        <x-input wire:model.defer="nama" class="text-sm" id="nama" class="block w-full mt-1"
                            type="text" name="nama" autofocus />
                        <span class="text-sm text-danger">
                            @error('nama')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- file -->
                    <div class="mt-4">
                        <x-label for="filename" :value="__('Upload File')" />

                        <x-input wire:model="filename" id="filename"
                            class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            type="file" name="filename" autofocus />
                        <span class="text-sm text-danger">
                            @error('filename')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mt-8">

                        <button type="submit" class="btn-primary">
                            Submit
                        </button>
                        <button @click="modalCreate = false" type="button" class="btn-secondary">
                            Close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
