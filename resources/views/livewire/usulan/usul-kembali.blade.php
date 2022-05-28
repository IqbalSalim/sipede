<div>
    <form wire:submit.prevent="store" novalidate>
        @csrf
        <div x-show="usulKembali" class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40">

            <!-- A basic usulKembali dialog with title, body and one button to close -->

            <div x-show="usulKembali" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="flex flex-col w-4/12 p-4 mx-2 my-auto text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl h-3/6">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Usulan Kegiatan
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan lengkapi data usulan kegiatan
                        </p>
                    </div>
                </div>


                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <div class="mt-4">
                        <x-label for="tahun" :value="__('Usulan Kembali Untuk Tahun')" />

                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="tahun" id="tahun" wire:model="tahun">
                            <option value="">-- Pilih tahun --</option>
                            @foreach ($tahuns as $tahun)
                                <option value="{{ $tahun }}">{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div>
                    <div class="flex items-center justify-between mt-8">
                        <button type="submit" class="text-sm btn-primary">
                            {{ __('Submit') }}
                        </button>
                        <button type="button" @click="usulKembali = false" wire:click='resetForm'
                            class="text-sm btn-secondary">
                            Cancel
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
