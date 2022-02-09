<div>
    <form wire:submit.prevent='store' novalidate>
        @csrf
        <div class="fixed inset-0 z-50 flex justify-center w-full py-8 bg-black bg-opacity-40" x-show="modal">

            <!-- A basic modal dialog with title, body and one button to close -->

            <div @click.away="modal = false" x-show="modal" x-transition.duration.500
                class="flex flex-col w-11/12 h-auto p-4 mx-2 text-left bg-white divide-y-2 divide-gray-300 rounded shadow-xl md:10/12 lg:w-6/12">


                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Form User
                    </h3>

                    <div class="mt-2">
                        <p class="text-sm leading-5 text-primary">
                            silahkan isi data user
                        </p>
                    </div>
                </div>

                <div class="flex flex-col flex-1 px-4 py-2 overflow-auto h-96">


                    <!-- Role -->
                    <div>
                        <x-label for="role" :value="__('Role')" />
                        {{-- <x-input wire:model.defer="role" id="role" class="block w-full mt-1 capitalize" type="text"
                            name="role" disabled /> --}}
                        <select
                            class="block w-full mt-1 capitalize border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50'"
                            name="role" id="role" wire:model="role">
                            <option value="">-- Pilih Role --</option>
                            @foreach ($roles as $row)
                                <option value="{{ $row->name }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-sm text-danger">
                            @error('role')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Name -->
                    <div class="mt-4">
                        <x-label for="name" :value="__('Name')" />

                        <x-input wire:model.defer="name" id="name" class="block w-full mt-1" type="text" name="name"
                            autofocus />
                        <span class="text-sm text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-label for="email" :value="__('Email')" />

                        <x-input wire:model.defer="email" id="email" class="block w-full mt-1" type="email"
                            name="email" />
                        <span class="text-sm text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input wire:model.defer="password" id="password" class="block w-full mt-1" type="password"
                            name="password" autocomplete="new-password" />
                        <span class="text-sm text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input wire:model.defer="password_confirmation" id="password_confirmation"
                            class="block w-full mt-1" type="password" name="password_confirmation" required />
                    </div>



                </div>
                <div>
                    <div class="flex items-center justify-between mt-8">

                        <x-button class="">
                            {{ __('Submit') }}
                        </x-button>
                        <button type="button" @click="modal = false" class="btn-secondary">
                            Close
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
