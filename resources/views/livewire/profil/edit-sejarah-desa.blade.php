<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Sejarah Desa') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-gray-400">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Profil Desa</div>
            <div>-</div>
            <div>Sejarah Desa</div>
        </div>
    </x-slot>


    <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
        <div class="py-2 border-b-2 border-gray-200">
            <h1 class="text-lg font-medium text-default">Sejarah Desa</h1>
        </div>
        <div class="flex flex-col py-2 space-y-8 ">
            <div>
                <h2>Editor</h2>
                <x-editor wire:model="sejarahDesa" />
            </div>

            <!-- Preview what the editor is creating -->
            <div class="flex flex-row">
                <button class="font-medium btn-primary btn-sm" wire:click.prevent='update'>Simpan</button>
            </div>
        </div>
    </div>

    {{-- The Master doesn't talk, he acts. --}}
</div>
