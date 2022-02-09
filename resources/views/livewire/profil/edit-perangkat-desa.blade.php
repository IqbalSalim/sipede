<div>
    <div>
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Perangkat Desa') }}
            </h2>
            <div class="flex flex-row space-x-1 text-sm text-gray-400">
                <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
                <div>-</div>
                <div>Profil Desa</div>
                <div>-</div>
                <div>Perangkat Desa</div>
            </div>
        </x-slot>

        <div class="px-4 py-12 md:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
                <div class="py-2 border-b-2 border-gray-200">
                    <h1 class="text-lg font-medium text-default">Perangkat Desa</h1>
                </div>
                <div class="flex flex-col py-2 space-y-8 ">
                    <div class="mt-4">
                        <x-label for="perangkat_desa" :value="__('Upload File')" />

                        <x-input wire:model="perangkat_desa" id="perangkat_desa"
                            class="block w-full mt-1 text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            type="file" name="perangkat_desa" autofocus />
                        <span class="text-sm text-danger">
                            @error('perangkat_desa')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Preview what the editor is creating -->
                    <div class="flex flex-row">
                        <button class="font-medium btn-primary btn-sm" wire:click.prevent='update'>Simpan</button>
                    </div>

                    <div>
                        <img src="{{ asset($gambar) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        {{-- The Master doesn't talk, he acts. --}}
    </div>
