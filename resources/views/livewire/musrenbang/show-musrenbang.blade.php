<div>
    <div class="fixed inset-0 z-50 flex justify-center w-full py-8 bg-black bg-opacity-40" x-show="modalShow">

        <!-- A basic modalCreate dialog with title, body and one button to close -->

        <div x-show="modalShow" x-transition:enter.duration.500ms x-transition:leave.duration.400ms
            @click.away="modalShow = false"
            class="flex flex-col w-11/12 h-auto p-4 mx-2 text-left transition-all duration-1000 ease-in-out transform bg-white divide-y-2 divide-gray-300 rounded shadow-xl md:w-10/12 lg:w-10/12">

            <div class="flex flex-col h-screen">
                <div class="flex-1 h-96">
                    @if ($file !== null)
                        <embed src="{{ asset('storage/' . $this->file->filename) }}" type="application/pdf"
                            class="w-full" height="100%">
                    @endif
                </div>
                <div class="flex items-center justify-end mt-8">
                    <button @click="modalShow = false" type="button" class="btn-secondary">
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
