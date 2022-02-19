<div>
    <form wire:submit.prevent="store(Object.fromEntries(new FormData($event.target)))" novalidate>
        @csrf
        <div x-show="modal" class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div @click.away="modal = false" x-show="modal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90"
                class="flex flex-col w-8/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Usulan Kegiatan
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data usulan kegiatan
                        </p>
                    </div>
                </div>


                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    {{-- Tahun Usulan --}}
                    <div class="mt-4">
                        <x-label for="tahun" :value="__('Usulan Tahun')" />

                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="tahun" id="tahun" wire:model="tahun">
                            <option value="">-- Pilih tahun --</option>
                            @foreach ($tahuns as $tahun)
                                <option value="{{ $tahun }}">{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>

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
                            name="subbidang" id="subbidang" wire:model="subbidang" wire:change='changeSubBidang'>
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

                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="kegiatan" id="kegiatan" wire:model="kegiatan">
                            <option value="">-- Pilih Nama Kegiatan --</option>
                            @if ($kegiatans != null)
                                @foreach ($kegiatans as $row)
                                    <option value="{{ $row->id }}">{{ $row->nama }}</option>
                                @endforeach
                            @endif
                        </select>
                        <span class="text-sm text-danger">
                            @error('kegiatan')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="mt-4">
                        <x-label for="lokasi" :value="__('Nama lokasi')" />
                        <select id="select" class="hidden">
                            <option value="Dusun I Mimbaru">Dusun I Mimbaru</option>
                            <option value="Dusun II Sipatana">Dusun II Sipatana</option>
                            <option value="Dusun III Monggoyito">Dusun III Monggoyito</option>
                        </select>


                        <div x-data="dropdown()" x-init="loadOptions()" x-on:items-load.window="clearValues()"
                            class="flex flex-col items-center w-full h-64">
                            <input name="lokasi" type="hidden" x-bind:value="selectedValues()">
                            <div class="relative inline-block w-full">
                                <div class="relative flex flex-col items-center">
                                    <div x-on:click="open" class="w-full svelte-1l8159u">
                                        <div
                                            class="flex p-1 my-2 bg-white border border-gray-200 rounded svelte-1l8159u">
                                            <div class="flex flex-wrap flex-auto">
                                                <template x-for="(option,index) in selected"
                                                    :key="options[option].value">
                                                    <div
                                                        class="flex items-center justify-center px-2 py-1 m-1 font-medium text-teal-700 bg-white bg-teal-100 border border-teal-300 rounded-full ">
                                                        <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                            options[option]" x-text="options[option].text"></div>
                                                        <div class="flex flex-row-reverse flex-auto">
                                                            <div x-on:click="remove(index,option)">
                                                                <svg class="w-6 h-6 fill-current " role="button"
                                                                    viewBox="0 0 20 20">
                                                                    <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                   c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                   l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                   C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                </svg>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                                <div x-show="selected.length    == 0" class="flex-1">
                                                    <input placeholder="-- Pilih Lokasi --"
                                                        class="w-full h-full p-1 px-2 text-black placeholder-black bg-transparent outline-none appearance-none"
                                                        x-bind:value="selectedValues()">

                                                </div>
                                            </div>
                                            <div
                                                class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 border-l border-gray-200 svelte-1l8159u">

                                                <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                    <svg version="1.1" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                            c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                            L17.418,6.109z" />
                                                    </svg>

                                                </button>
                                                <button type="button" x-show="isOpen() === false" @click="close"
                                                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                                        <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                            c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                            " />
                                                    </svg>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full px-4">
                                        <div x-show.transition.origin.top="isOpen()"
                                            class="absolute z-40 w-full overflow-y-auto bg-white rounded shadow top-100 lef-0 max-h-select svelte-5uyqqj"
                                            x-on:click.away="close">
                                            <div class="flex flex-col w-full">
                                                <template x-for="(option,index) in options" :key="option">
                                                    <div>
                                                        <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                            @click="select(index,$event)">
                                                            <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                                <div class="flex items-center w-full">
                                                                    <div class="mx-2 leading-6" x-model="option"
                                                                        x-text="option.text"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-sm text-danger">
                                    @error('lokasi')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <!-- on tailwind components page will no work  -->


                            </div>
                        </div>
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
