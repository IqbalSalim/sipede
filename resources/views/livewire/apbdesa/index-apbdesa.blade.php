<div class="px-4 py-12 md:px-6 lg:px-8">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('APB Desa') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-gray-400">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>APB Desa</div>
        </div>
    </x-slot>
    <form action="{{ route('cetak-apbdesa') }}" method="POST">
        @csrf
        <div class="px-4 py-2 bg-white divide-y-2 rounded-lg shadow-lg divide-gray-2">
            <div class="py-2">
                <h2 class="text-lg font-medium text-default">Form APB Desa</h2>
            </div>

            <div class="grid grid-cols-3 gap-3 py-2">

                <div class="mt-4">
                    <x-label for="pendapatan_desa" :value="__('Pendapatan Desa')" />

                    <x-input wire:model.defer="pendapatan_desa" min="0" id="pendapatan_desa"
                        class="block w-full mt-1 text-sm" type="number" name="pendapatan_desa" autofocus />
                    <span class="text-sm text-danger">
                        @error('pendapatan_desa')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-4">
                    <x-label for="penerimaan_pembiayaan" :value="__('Penerimaan Pembiayaan')" />

                    <x-input wire:model.defer="penerimaan_pembiayaan" id="penerimaan_pembiayaan"
                        class="block w-full mt-1 text-sm" type="number" min="0" name="penerimaan_pembiayaan"
                        autofocus />
                    <span class="text-sm text-danger">
                        @error('penerimaan_pembiayaan')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mt-4">
                    <x-label for="pengeluaran_pembiayaan" :value="__('Pengeluaran Pembiayaan')" />

                    <x-input wire:model.defer="pengeluaran_pembiayaan" id="pengeluaran_pembiayaan"
                        class="block w-full mt-1 text-sm" type="number" min="0" name="pengeluaran_pembiayaan"
                        autofocus />
                    <span class="text-sm text-danger">
                        @error('pengeluaran_pembiayaan')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>

            <div class="py-2">
                <button type="submit" class="text-sm btn-success">Export Excel</button>
            </div>
        </div>
    </form>
</div>
