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
    <div class="px-4 py-3 bg-white rounded-lg shadow-lg">
        <div class="flex flex-row justify-between py-2 space-x-8 border-b-2 border-gray-200">
            @if (count($pendapatans) !== 0)
                <div>
                    <form action="{{ url('export-apbdes') }}" method="POST" novalidate>
                        @csrf
                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                        <button type="submit" class="text-sm btn-success">Export Excel</button>
                    </form>
                </div>
            @endif
        </div>
        <div class="flex flex-row items-center justify-between py-2">
            <div class="flex flex-row space-x-4">
                <div>
                    <x-label for="paginate" :value="__('Item')" />
                    <select name="paginate" id="paginate" wire:model="paginate"
                        class="block w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
                <div>
                    <x-label for="tahun" :value="__('Tahun')" />
                    <select name="tahun" id="tahun" wire:model="tahun"
                        class="w-full mt-1 text-sm capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        @foreach ($tahuns as $item)
                            <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
        <h3 class="text-xl font-semibold text-center uppercase">Pendapatan</h3>
        <div class="w-full overflow-x-auto md:overflow-hidden">
            <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr class="">
                        <th scope="col"
                            class="w-3/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Kode Rekening
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Uraian
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Anggaran
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Sumber Dana
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @for ($i = 0; $i < count($pendapatans); $i++)
                        @if ($i > 0)
                            @if ($pendapatans[$i]->kategoriPendapatan->kategori == $pendapatans[$i - 1]->kategoriPendapatan->kategori)
                                <tr>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->kategoriPendapatan->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->uraian }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->anggaran }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->sumber_dana }}
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-yellow-300">
                                    <td class="px-4 py-3 text-xs font-semibold text-gray-500 md:px-6" colspan="4">
                                        {{ $pendapatans[$i]->kategoriPendapatan->kategori }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->kategoriPendapatan->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->uraian }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->anggaran }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $pendapatans[$i]->sumber_dana }}
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr class="bg-yellow-300">
                                <td class="px-4 py-3 text-xs font-semibold text-gray-500 md:px-6" colspan="4">
                                    {{ $pendapatans[$i]->kategoriPendapatan->kategori }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $pendapatans[$i]->kategoriPendapatan->kd_rek }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $pendapatans[$i]->uraian }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $pendapatans[$i]->anggaran }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $pendapatans[$i]->sumber_dana }}
                                </td>
                            </tr>
                        @endif
                    @endfor
                </tbody>
            </table>
            {{-- {{ $pendapatans->links() }} --}}
        </div>

        <h3 class="mt-4 text-xl font-semibold text-center uppercase">Belanja</h3>
        <div class="w-full overflow-x-auto md:overflow-hidden">
            <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr class="">
                        <th scope="col"
                            class="w-3/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Kode Rekening
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Uraian
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Anggaran
                        </th>
                        <th scope="col"
                            class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                            Sumber Dana
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @for ($i = 0; $i < count($kegiatans); $i++)
                        @if ($i > 0)
                            @if ($kegiatans[$i]->kegiatan->subbidang->bidang->nama == $kegiatans[$i - 1]->kegiatan->subbidang->bidang->nama)
                                <tr>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->kegiatan->subbidang->bidang_id .$kegiatans[$i]->kegiatan->subbidang->kd_rek .$kegiatans[$i]->kegiatan->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->kegiatan->nama }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->jumlah }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->sumber }}
                                    </td>
                                </tr>
                            @else
                                <tr class="bg-yellow-300">
                                    <td colspan="4" class="px-4 py-3 text-xs font-medium text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->kegiatan->subbidang->bidang->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->kegiatan->subbidang->bidang_id .$kegiatans[$i]->kegiatan->subbidang->kd_rek .$kegiatans[$i]->kegiatan->kd_rek }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->kegiatan->nama }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->jumlah }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                        {{ $kegiatans[$i]->sumber }}
                                    </td>
                                </tr>
                            @endif
                        @else
                            <tr class="bg-yellow-300">
                                <td colspan="4" class="px-4 py-3 text-xs font-medium text-gray-500 md:px-6">
                                    {{ $kegiatans[$i]->kegiatan->subbidang->bidang->nama }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $kegiatans[$i]->kegiatan->subbidang->bidang_id .$kegiatans[$i]->kegiatan->subbidang->kd_rek .$kegiatans[$i]->kegiatan->kd_rek }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $kegiatans[$i]->kegiatan->nama }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $kegiatans[$i]->jumlah }}
                                </td>
                                <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                    {{ $kegiatans[$i]->sumber }}
                                </td>
                            </tr>
                        @endif
                    @endfor
                </tbody>
            </table>
        </div>

    </div>

</div>
