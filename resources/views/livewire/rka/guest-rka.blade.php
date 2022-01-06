<div>
    <div class="bg-gray-100" x-data="{ modalShow: false }">
        <livewire:rka.show-rka></livewire:rka.show-rka>
        <div class="px-4 py-12 md:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
                <div class="block py-2 text-lg text-gray-500">
                    Rancangan Kegiatan dan Anggaran Desa
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
                <div class="w-full overflow-x-auto md:overflow-hidden">
                    <table class="min-w-full mt-2 divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr class="">
                                <th scope="col"
                                    class="w-1/12 px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    #
                                </th>
                                <th scope="col"
                                    class="w-full px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase md:px-6">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-2 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase ">
                                    <span class="sr-only">Preview</span>
                                    <span class="sr-only">Download</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($rkas as $key => $rka)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6 whitespace-nowrap">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-2 py-4 md:px-6">
                                        {{ $rka->nama }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            <button @click="modalShow = true"
                                                wire:click.prevent="$emit('getfilePdf', {{ $rka->id }})"
                                                type="button" class="text-sm btn-secondary">show</button>
                                            <button wire:click.prevent="export({{ $rka->id }})" type="button"
                                                class="text-sm btn-primary">download</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                    {{ $rkas->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
