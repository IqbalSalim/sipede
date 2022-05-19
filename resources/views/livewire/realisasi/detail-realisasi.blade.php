<div class="fixed inset-0 z-50 flex justify-center w-full bg-black py-14 bg-opacity-40" x-show="modalDetail">

    <!-- A basic modal dialog with title, body and one button to close -->

    <div @click.away="modalDetail = false" x-show="modalDetail" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="flex flex-col w-10/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white rounded shadow-xl">


        <div x-data="tabs()">
            <div
                class="flex flex-row justify-between text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <button @click="setActive(1)"
                            :class="isActive(1) ? 'text-blue-600 border-blue-600 active' :
                                'border-transparent hover:text-gray-600 hover:border-gray-300'"
                            class="inline-block p-4 border-b-2 rounded-t-lg">Detail
                            Realisasi</button>
                    </li>
                    <li class="mr-2">
                        <button @click="setActive(2)"
                            :class="isActive(2) ? 'text-blue-600 border-blue-600 active' :
                                'border-transparent hover:text-gray-600 hover:border-gray-300'"
                            class="inline-block p-4 border-b-2 rounded-t-lg" aria-current="page">Info Kegiatan</button>
                    </li>
                </ul>
                <div class="flex justify-end p-2">
                    <button type="button" wire:click='close'
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div x-show="isActive(1)" class="w-full overflow-x-auto md:overflow-hidden">
                @if ($status == 'terlaksana')
                    <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr class="">
                                <th scope="col"
                                    class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    #
                                </th>
                                <th scope="col"
                                    class="w-8/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Rincian
                                </th>
                                <th scope="col"
                                    class="w-4/12 px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Harga (Rp)
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                    <span class="sr-only">Edit</span>
                                    <span class="sr-only">Hapus</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($realisasi != null)
                                @php $no = 1 @endphp
                                @foreach ($realisasi as $row)
                                    <tr>
                                        <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                            {{ $no++ }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                            {{ $row->uraian }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-gray-500 md:px-6">
                                            {{ $row->harga }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                @endif
                {{-- {{ $kegiatans->links() }} --}}
            </div>


            <div x-show="isActive(2)" class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                @if ($rkp != null)
                    <table class="min-w-full mt-2 table-auto">
                        <tbody class="divide-y-2 divide-gray-200">
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Bidang</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->kegiatan->subbidang->bidang->nama }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Sub Bidang</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->kegiatan->subbidang->nama }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Kegiatan</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->kegiatan->nama }}
                                    </td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Kode Rekening</th>
                        <td class="px-4 py-3 text-sm font-medium  text-success md:px-6 whitespace-nowrap">
                                    {{ $rkp->kegiatan->subbidang->bidang_id . ' ' . $rkp->kegiatan->subbidang->kd_rek . ' ' . $rkp->kegiatan->kd_rek }}
                                    </td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Tahun</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->tahun }}</td>
                            </tr>

                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Mendukung SDGs Desa Ke</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->sdgs }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Volume</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->volume . ' ' . $rkp->satuan }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Sasaran/Manfaat</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->sasaran }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Waktu Pelaksanaan</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->waktu }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Jumlah</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">{{ $rkp->jumlah }}
                                    </td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Sumber Pembiayaan</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->sumber }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Pola Pelaksanaan</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->pola }}</td>
                            </tr>
                            <tr>
                                <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Rencana Pelaksanaan Kegiatan</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                    {{ $rkp->rencana }}</td>
                            </tr>

                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>


    <script>
        function tabs() {
            return {
                active: 1,
                isActive(tab) {
                    return tab == this.active;
                },
                setActive(value) {
                    this.active = value;
                }
            }
        }
    </script>

</div>
