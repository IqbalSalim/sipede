<div class="" x-cloak x-data="{ modal: false, modalEdit: false }" x-on:close-modal.window="modal = false"
    x-on:close-modal-edit.window="modalEdit = false">

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Warta Kegiatan') }}
        </h2>
        <div class="flex flex-row space-x-1 text-sm text-gray-400">
            <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
            <div>-</div>
            <div>Warta Kegiatan</div>
        </div>
    </x-slot>

    <livewire:warta.create-warta></livewire:warta.create-warta>
    <livewire:warta.update-warta></livewire:warta.update-warta>

    <div class="px-4 py-12 md:px-6 lg:px-8">
        <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
            <div
                class="flex flex-row items-center justify-between py-2 font-semibold text-gray-700 border-b-2 border-gray-300">
                <div>
                    <button class="text-sm btn-primary" @click="modal = true">Tambah Warta</button>

                </div>
            </div>
            <div class="flex flex-row items-center justify-between py-2">
                <div>
                    <select name="paginate" id="paginate" wire:model="paginate"
                        class="block w-full text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="6">6</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div class="md:w-3/12">
                    <x-input wire:model="search" id="search" class="block w-full text-sm" placeholder="Search..."
                        type="text" name="search" autofocus />
                </div>
            </div>
            <div class="w-full overflow-x-auto md:overflow-hidden">
                <div class="grid grid-cols-1 gap-4 py-2 md:grid-cols-2 lg:grid-cols-3">
                    @if ($wartas)
                        @foreach ($wartas as $warta)
                            <div class="relative z-0 flex-col space-y-4 bg-white shadow-2xl rounded-xl">
                                @if (Storage::disk('public')->exists($warta->gambar))
                                    <img class="object-cover w-full h-60 rounded-t-xl"
                                        src="{{ asset('storage/' . $warta->gambar) }}" alt="">
                                @else
                                    <img class="object-cover w-full h-60 rounded-t-xl"
                                        src="{{ asset('storage/images/no-image.png') }}" alt="">
                                @endif
                                <div class="flex flex-col px-4 py-2 pb-16 space-y-2">
                                    <h1 class="text-lg font-medium text-primary line-clamp-2">{{ $warta->judul }}</h1>
                                    <p class="text-gray-700 line-clamp-3">{{ $warta->isi }}</p>
                                    <span class="text-sm text-default">
                                        {{ date('d M Y', strtotime($warta->created_at)) }}
                                    </span>
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 right-0 flex flex-row items-center justify-center py-2 space-x-4 text-center">
                                    <button wire:click="$emit('getWarta', {{ $warta->id }})"
                                        @click="modalEdit = true" type="button" class="btn-secondary">Edit</button>
                                    <button wire:click="alertConfirm({{ $warta->id }})" type="button"
                                        class="btn-danger">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            {{ $wartas->links() }}

        </div>
    </div>


</div>
