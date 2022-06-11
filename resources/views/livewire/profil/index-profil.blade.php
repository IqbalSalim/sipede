<div>

    @php
        $request = request();
        if ($request->has('q')) {
            $q = request()->q;
        } else {
            $q = 'visi-misi';
        }
    @endphp
    <div class="px-4 py-12 md:px-6 lg:px-8 ">
        <div class="px-4 bg-white rounded-lg shadow-lg " x-data="{ selected: '{{ $q }}', activeClasses: 'border-b-2 text-primary border-primary', inactiveClasses: 'opacity-50 hover:opacity-100' }">

            <ul
                class="flex flex-col items-center w-full px-1 py-2 space-y-2 text-sm font-semibold capitalize border-b-2 border-gray-100 md:items-center md:space-x-6 md:flex-row md:space-y-0 md:text-base text-default">
                <li class="">
                    <a href="#visi-misi" x-on:click="selected = 'visi-misi'"
                        :class="selected === 'visi-misi' ? activeClasses : inactiveClasses">visi misi</a>
                </li>
                <li class="">
                    <a href="#sejarah-desa" x-on:click="selected = 'sejarah-desa'"
                        :class="selected === 'sejarah-desa' ? activeClasses : inactiveClasses">sejarah desa</a>
                </li>
                <li class="">
                    <a href="#gambaran-umum" x-on:click="selected = 'gambaran-umum'"
                        :class=" selected === 'gambaran-umum' ? activeClasses : inactiveClasses">gambaran umum</a>
                </li>
                <li class="">
                    <a href="#perangkat-desa" x-on:click="selected = 'perangkat-desa'"
                        :class=" selected === 'perangkat-desa' ? activeClasses : inactiveClasses">perangkat desa</a>
                </li>
            </ul>


            <div x-show="selected === 'visi-misi'" class="p-4 prose max-w-none text-default">
                @if ($profil !== null)
                    {!! $profil->visi_misi !!}
                @endif
            </div>

            <div x-show="selected === 'sejarah-desa'" class="p-4 prose max-w-none text-default">
                @if ($profil !== null)
                    {!! $profil->sejarah_desa !!}
                @endif
            </div>

            <div x-show="selected === 'gambaran-umum'" class="p-4 prose max-w-none text-default">
                @if ($profil !== null)
                    {!! $profil->gambaran_umum !!}
                @endif
            </div>
            <div class="p-4 prose max-w-none text-default"></div>

            <div x-show="selected === 'perangkat-desa'" class="p-4">
                @if ($profil !== null)
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('storage/' . $profil->perangkat_desa) }}" alt="">
                    </div>
                @endif
            </div>


        </div>

    </div>

</div>

<style>
    /* Basic editor styles */



    >*+* {
        margin-top: 0.75em;
    }

    button.is-active {
        background-color: #3b82f6;
        color: white;
    }

    .ProseMirror {
        padding: 0.5rem 1rem;
        margin: 1rem 0;
        border: 1px solid #ccc;
    }

    ul,
    ol {
        padding: 0 1rem;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        line-height: 1.1;
    }

    code {
        background-color: rgba(#616161, 0.1);
        color: #616161;
    }

    pre {
        background: #0D0D0D;
        color: #FFF;
        font-family: 'JetBrainsMono', monospace;
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;

        code {
            color: inherit;
            padding: 0;
            background: none;
            font-size: 0.8rem;
        }
    }

    img {
        max-width: 100%;
        height: auto;
    }

    blockquote {
        padding-left: 1rem;
        border-left: 2px solid rgba(#0D0D0D, 0.1);
    }

    hr {
        border: none;
        border-top: 2px solid rgba(#0D0D0D, 0.1);
        margin: 2rem 0;
    }


    /* Table-specific styling */

    table {
        border-collapse: collapse;
        table-layout: fixed;
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        overflow: hidden;
    }

    .selectedCell:after {
        z-index: 2;
        position: absolute;
        content: "";
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: rgba(200, 200, 255, 0.4);
        pointer-events: none;
    }

    .column-resize-handle {
        position: absolute;
        right: -2px;
        top: 0;
        bottom: -2px;
        width: 4px;
        background-color: #adf;
        pointer-events: none;
    }

    p {
        margin: 0;
    }

    .prose p {
        margin: 0;
    }

    .prose tbody td:first-child {
        padding-left: 0.57em;
    }

    th {
        font-weight: bold;
        text-align: left;
        background-color: #f1f3f5;
    }

    td,
    th {
        min-width: 1em;
        border: 2px solid #ced4da;
        padding: 3px 5px;
        vertical-align: top;
        box-sizing: border-box;
        position: relative;

        >* {
            margin-bottom: 0;
        }
    }


    .tableWrapper {
        overflow-x: auto;
    }

    .resize-cursor {
        cursor: ew-resize;
        cursor: col-resize;
    }
</style>
