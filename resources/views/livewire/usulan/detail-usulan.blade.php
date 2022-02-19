<div>

    <div x-show="modalDetail" class="fixed inset-0 z-50 flex justify-center w-full py-4 bg-black bg-opacity-40">

        <!-- A basic modalDetail dialog with title, body and one button to close -->

        <div @click.away="modalDetail = false" x-show="modalDetail"
            x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="flex flex-col w-8/12 h-auto p-4 mx-2 text-left transition-all duration-500 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl">


            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Detail Usulan Kegiatan
                </h3>
            </div>


            <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">


                @if ($usulan != null)
                    <div>
                        <table class="min-w-full mt-2 table-auto">
                            <tbody class="divide-y-2 divide-gray-200">
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Bidang</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                        {{ $usulan->kegiatan->subbidang->bidang->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Sub Bidang</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                        {{ $usulan->kegiatan->subbidang->nama }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Kegiatan</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                        {{ $usulan->kegiatan->nama }}
                                        </td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Kode Rekening</th>
                        <td class="px-4 py-3 text-sm font-medium  text-success md:px-6 whitespace-nowrap">
                                        {{ $usulan->kegiatan->subbidang->bidang_id .' ' .$usulan->kegiatan->subbidang->kd_rek .' ' .$usulan->kegiatan->kd_rek }}
                                        </td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Tahun</th>
                        <td class="px-4 py-3 text-sm text-gray-500  md:px-6 whitespace-nowrap">
                                        {{ $usulan->tahun }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Keterangan</th>
                        <td class="px-4 py-3 text-sm  text-danger md:px-6 whitespace-nowrap">
                                        {{ $usulan->keterangan }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase bg-gray-50 md:px-6"">Status</th>
                        <td  @class([
                            'px-4 py-3 text-sm capitalize font-medium  md:px-6 whitespace-nowrap',
                            'text-warning' => $usulan->status->value == 'verifikasi',
                            'text-success' => $usulan->status->value == 'sesuai',
                            'text-danger' => $usulan->status->value == 'tidak sesuai',
                        ])>
                                            {{ $usulan->status->value }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
 @endif
                    </div>


                    <div>
                        <div class="flex items-center justify-between mt-8">
                            <button type="submit" class="text-sm btn-primary">
                                {{ __('Submit') }}
                            </button>
                            <button type="button" @click="modalDetail = false" class="text-sm btn-secondary">
                                Close
                            </button>
                        </div>
                    </div>

            </div>
        </div>
    </div>
