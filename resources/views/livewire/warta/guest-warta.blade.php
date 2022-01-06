<div>
    <div class="bg-gray-100">
        <div class="px-4 py-12 md:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
                <div class="block py-2 text-lg text-gray-500">
                    Warta Kegiatan
                </div>
                <div class="flex flex-row items-center justify-between">
                    <div>
                        <select name="paginate" id="paginate" wire:model="paginate"
                            class="block w-full text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <div class="md:w-3/12">
                        <x-input wire:model="search" id="search" class="block w-full text-sm" placeholder="Search..."
                            type="text" name="search" autofocus />
                    </div>
                </div>
                <div class="flex flex-col py-4 space-y-2">
                    @if ($wartas)
                        @foreach ($wartas as $warta)
                            <a href="warta-show/{{ $warta->id }}" class="flex flex-row bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/' . $warta->gambar) }}" alt="gambar"
                                    class="w-4/12 rounded-l-lg">
                                <div class="w-8/12 p-4 text-black hover:text-primary">
                                    <h2 class="font-semibold">{{ $warta->judul }}</h2>
                                    <p class="text-sm text-justify line-clamp-2 md:line-clamp-3">
                                        {{ $warta->isi }}
                                    </p>
                                    <span class="text-xs text-default">35 menit lalu</span>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
                {{ $wartas->links() }}
            </div>
        </div>
    </div>
</div>
