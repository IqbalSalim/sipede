<div class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40" x-show="modalDetail">

    <!-- A basic modal dialog with title, body and one button to close -->

    <div @click.away="modalDetail = false" x-show="modalDetail" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="flex flex-col w-10/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg font-medium leading-6 text-gray-900">
                Detail RKP Desa
            </h3>
        </div>

        <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
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
                                {{ $rkp->kegiatan->subbidang->bidang_id .' ' .$rkp->kegiatan->subbidang->kd_rek .' ' .$rkp->kegiatan->kd_rek }}
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
        <div>
            <div class="flex items-center justify-between mt-8">
                <button type="button" @click="modalDetail = false" class="text-sm btn-secondary">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
