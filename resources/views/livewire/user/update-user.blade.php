<div>
    <form wire:submit.prevent='update' novalidate>
        @csrf
        <div class="fixed inset-0 z-50 flex justify-center w-full py-8 bg-black bg-opacity-40" x-show="modalEdit">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div @click.away="modalEdit = false" x-show="modalEdit" x-transition.duration.500
                class="flex flex-col w-11/12 h-auto p-4 mx-2 text-left bg-white divide-y-2 divide-gray-300 rounded shadow-xl md:w-10/12 lg:w-6/12">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Form User
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-secondary">
                            silahkan ubah data user
                        </p>
                    </div>
                </div>

                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">
                    <input type="hidden" wire:model="user_id">

                    <!-- Role -->
                    <div>
                        <x-label for="user_role" :value="__('Role')" />
                        <x-input wire:model.defer="user_role" id="user_role" value="operator"
                            class="block w-full mt-1 capitalize" type="text" name="user_role" disabled />

                        <span class="text-sm text-danger">
                            @error('user_role')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-label for="user_name" :value="__('Name')" />

                        <x-input wire:model.defer="user_name" id="user_name" class="block w-full mt-1" type="text"
                            name="user_name" autofocus />
                        <span class="text-sm text-danger">
                            @error('user_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="user_email" :value="__('Email')" />

                        <x-input wire:model.defer="user_email" id="user_email" class="block w-full mt-1" type="email"
                            name="user_email" />
                        <span class="text-sm text-danger">
                            @error('user_email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>







                </div>
                <div>
                    <div class="flex items-center justify-between mt-8">

                        <x-button class="">
                            {{ __('Submit') }}
                        </x-button>
                        <button type="button" @click="modalEdit = false" class="btn-secondary">
                            Close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
