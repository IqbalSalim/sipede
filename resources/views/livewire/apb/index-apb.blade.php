<div class="px-4 py-12 mx-auto md:px-6 max-w-7xl sm:px-6 lg:px-8">
    <div class="bg-gray-100" x-data="{ modalCreate: false, modalShow: false, modalEdit: false }" x-cloak x-on:close-modal.window="modalCreate = false"
        x-on:close-modal-edit.window="modalEdit = false">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('APB Desa') }}
            </h2>
            <div class="flex flex-row space-x-1 text-sm text-gray-400">
                <div class="hover:text-primary"><a href="/dashboard">Dashboard</a></div>
                <div>-</div>
                <div>Transparansi</div>
                <div>-</div>
                <div>APB Desa</div>
            </div>
        </x-slot>


        <livewire:apb.create-apb></livewire:apb.create-apb>
        <livewire:apb.update-apb></livewire:apb.update-apb>
        <livewire:apb.show></livewire:apb.show>



        <div class="px-4 py-12 md:px-6 lg:px-8">
            <div class="px-4 py-4 bg-white rounded-lg shadow-lg">
                <div class="py-2 border-b-2 border-gray-200">
                    <button wire:click="$emit('tambahApb','createForm')" @click="modalCreate = true"
                        class="text-sm btn-primary" type="button">Tambah
                        APB</button>
                </div>
                <div class="flex flex-row items-center justify-between py-2">
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
                                    <span class="sr-only">Edit</span>
                                    <span class="sr-only">Hapus</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($apbs as $key => $apb)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500 md:px-6 whitespace-nowrap">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-2 py-4 md:px-6">
                                        {{ $apb->nama }}
                                    </td>
                                    <td class="px-2 md:px-6">
                                        <div class="flex flex-row items-center space-x-4">
                                            <button wire:click.prevent="$emit('getfilePdf', {{ $apb->id }})"
                                                @click="modalShow = true" type="button"
                                                class="text-xs btn-primary">lihat</button>
                                            <button wire:click.prevent="$emit('getApb', {{ $apb->id }})"
                                                @click="modalEdit = true" type="button"
                                                class="text-xs btn-success">edit</button>
                                            <button wire:click.prevent="alertConfirm({{ $apb->id }})" type="button"
                                                class="text-xs btn-danger">hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                    {{ $apbs->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
