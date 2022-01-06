<div>
    <div class="py-4 px-60">
        <div class="bg-white rounded-lg shadow-lg ">
            <div class="flex flex-col px-4 py-2">
                <h2 class="font-semibold">{{ $warta->judul }}</h2>
                <span class="text-sm">{{ $warta->created_at }}</span>
            </div>
            <img class="object-cover w-full" src="{{ asset('storage/' . $warta->gambar) }}" alt="gambar">
            <div class="flex flex-col px-4 py-2 space-y-2">
                {{ $warta->isi }}
            </div>
        </div>
    </div>
</div>
