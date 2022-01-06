<!-- resources/views/components/editor.blade.php -->
<div x-data="{content: @entangle($attributes->wire('model')),...setupEditor()}" x-init="() => init($refs.editor)"
    wire:ignore {{ $attributes->whereDoesntStartWith('wire:model') }}>

    <!-- The Controls -->
    <template x-if="editor">
        <div>
            <button :class="{ 'is-active': editor.isActive('bold') }" class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().toggleBold().focus().run()" title="Bold">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M8 11h4.5a2.5 2.5 0 1 0 0-5H8v5zm10 4.5a4.5 4.5 0 0 1-4.5 4.5H6V4h6.5a4.5 4.5 0 0 1 3.256 7.606A4.498 4.498 0 0 1 18 15.5zM8 13v5h5.5a2.5 2.5 0 1 0 0-5H8z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('italic') }" class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleItalic().run()" title="Italic">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M15 20H7v-2h2.927l2.116-12H9V4h8v2h-2.927l-2.116 12H15z" fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('paragraph') }"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().setParagraph().run()"
                title="Paragraph">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M12 6v15h-2v-5a6 6 0 1 1 0-12h10v2h-3v15h-2V6h-3zm-2 0a4 4 0 1 0 0 8V6z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('heading', { level: 1 }) }"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleHeading({ level: 1 }).run()" title="Heading 1">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path d="M13 20h-2v-7H4v7H2V4h2v7h7V4h2v16zm8-12v12h-2v-9.796l-2 .536V8.67L19.5 8H21z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('heading', { level: 2 }) }"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleHeading({ level: 2 }).run()" title="Heading 2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M4 4v7h7V4h2v16h-2v-7H4v7H2V4h2zm14.5 4c2.071 0 3.75 1.679 3.75 3.75 0 .857-.288 1.648-.772 2.28l-.148.18L18.034 18H22v2h-7v-1.556l4.82-5.546c.268-.307.43-.709.43-1.148 0-.966-.784-1.75-1.75-1.75-.918 0-1.671.707-1.744 1.606l-.006.144h-2C14.75 9.679 16.429 8 18.5 8z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>

            <button :class="{ 'is-active': editor.isActive('bulletList')}"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleBulletList().run()" title="Bullet List">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M8 4h13v2H8V4zM4.5 6.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 7a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm0 6.9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('orderedList')}"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleOrderedList().run()" title="Ordered List">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M8 4h13v2H8V4zM5 3v3h1v1H3V6h1V4H3V3h2zM3 14v-2.5h2V11H3v-1h3v2.5H4v.5h2v1H3zm2 5.5H3v-1h2V18H3v-1h3v4H3v-1h2v-.5zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('codeBlock')}"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().toggleCodeBlock().run()"
                title="Code Block">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M16.95 8.464l1.414-1.414 4.95 4.95-4.95 4.95-1.414-1.414L20.485 12 16.95 8.464zm-9.9 0L3.515 12l3.535 3.536-1.414 1.414L.686 12l4.95-4.95L7.05 8.464z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button :class="{ 'is-active': editor.isActive('blockquote')}"
                class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleBlockquote().run()" title="Blockquote">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M4.583 17.321C3.553 16.227 3 15 3 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179zm10 0C13.553 16.227 13 15 13 13.011c0-3.5 2.457-6.637 6.03-8.188l.893 1.378c-3.335 1.804-3.987 4.145-4.247 5.621.537-.278 1.24-.375 1.929-.311 1.804.167 3.226 1.648 3.226 3.489a3.5 3.5 0 0 1-3.5 3.5c-1.073 0-2.099-.49-2.748-1.179z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().undo().run()"
                title="Undo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M5.828 7l2.536 2.536L6.95 10.95 2 6l4.95-4.95 1.414 1.414L5.828 5H13a8 8 0 1 1 0 16H4v-2h9a6 6 0 1 0 0-12H5.828z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().redo().run()"
                title="Redo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M18.172 7H11a6 6 0 1 0 0 12h9v2h-9a8 8 0 1 1 0-16h7.172l-2.536-2.536L17.05 1.05 22 6l-4.95 4.95-1.414-1.414L18.172 7z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().insertTable({ rows: 3, cols: 3, withHeaderRow: true }).run()"
                title="Insert Table">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M13 10v4h6v-4h-6zm-2 0H5v4h6v-4zm2 9h6v-3h-6v3zm-2 0v-3H5v3h6zm2-14v3h6V5h-6zm-2 0H5v3h6V5zM4 3h16a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().addColumnBefore().run()" :disabled="!editor.can().addColumnBefore()"
                title="Add Column Before">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M20 3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1h-6c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h6zm-1 2h-4v14h4V5zM6 7c2.761 0 5 2.239 5 5s-2.239 5-5 5-5-2.239-5-5 2.239-5 5-5zm1 2H5v1.999L3 11v2l2-.001V15h2v-2.001L9 13v-2l-2-.001V9z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().addColumnAfter().run()" :disabled="!editor.can().addColumnAfter()"
                title="Add Column After">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M10 3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h6zM9 5H5v14h4V5zm9 2c2.761 0 5 2.239 5 5s-2.239 5-5 5-5-2.239-5-5 2.239-5 5-5zm1 2h-2v1.999L15 11v2l2-.001V15h2v-2.001L21 13v-2l-2-.001V9z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().deleteColumn().run()" :disabled="!editor.can().deleteColumn()"
                title="Delete Column">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M12 3c.552 0 1 .448 1 1v8c.835-.628 1.874-1 3-1 2.761 0 5 2.239 5 5s-2.239 5-5 5c-1.032 0-1.99-.313-2.787-.848L13 20c0 .552-.448 1-1 1H6c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h6zm-1 2H7v14h4V5zm8 10h-6v2h6v-2z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().addRowBefore().run()" :disabled="!editor.can().addRowBefore()"
                title="Add Row Before">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M20 13c.552 0 1 .448 1 1v6c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1v-6c0-.552.448-1 1-1h16zm-1 2H5v4h14v-4zM12 1c2.761 0 5 2.239 5 5s-2.239 5-5 5-5-2.239-5-5 2.239-5 5-5zm1 2h-2v1.999L9 5v2l2-.001V9h2V6.999L15 7V5l-2-.001V3z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().addRowAfter().run()"
                :disabled="!editor.can().addRowAfter()" title="Add Row After">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M12 13c2.761 0 5 2.239 5 5s-2.239 5-5 5-5-2.239-5-5 2.239-5 5-5zm1 2h-2v1.999L9 17v2l2-.001V21h2v-2.001L15 19v-2l-2-.001V15zm7-12c.552 0 1 .448 1 1v6c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h16zM5 5v4h14V5H5z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().deleteRow().run()"
                :disabled="!editor.can().deleteRow()" title="Delete Row">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M20 5c.552 0 1 .448 1 1v6c0 .552-.448 1-1 1 .628.835 1 1.874 1 3 0 2.761-2.239 5-5 5s-5-2.239-5-5c0-1.126.372-2.165 1-3H4c-.552 0-1-.448-1-1V6c0-.552.448-1 1-1h16zm-7 10v2h6v-2h-6zm6-8H5v4h14V7z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md" @click="editor.chain().focus().deleteTable().run()"
                :disabled="!editor.can().deleteTable()" title="Delete Table">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M6 4v16h12V4H6zM5 2h14a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1zm7 15a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleHeaderColumn().run()"
                :disabled="!editor.can().toggleHeaderColumn()" title="Header Column">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM7 5H4v14h3V5zm13 0H9v14h11V5z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleHeaderRow().run()" :disabled="!editor.can().toggleHeaderRow()"
                title="Header Row">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zM4 10v9h16v-9H4zm0-2h16V5H4v3z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().toggleHeaderCell().run()" :disabled="!editor.can().toggleHeaderCell()"
                title="Header Cell">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path
                        d="M21 3a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18zm-1 2H4v14h16V5zm-2 2v2H6V7h12z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().mergeOrSplit().run()" title="Merge or Split">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0H24V24H0z" />
                    <path
                        d="M20 3c.552 0 1 .448 1 1v16c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h16zm-9 2H5v14h6v-4h2v4h6V5h-6v4h-2V5zm4 4l3 3-3 3v-2H9v2l-3-3 3-3v2h6V9z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>

            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().goToNextCell().run()" :disabled="!editor.can().goToNextCell()"
                title="Next Cell">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().goToPreviousCell().run()" :disabled="!editor.can().goToPreviousCell()"
                title="Previous Cell">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M7.828 11H20v2H7.828l5.364 5.364-1.414 1.414L4 12l7.778-7.778 1.414 1.414z"
                        fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().setTextAlign('left').run()"
                :class="{ 'is-active': editor.isActive({ textAlign: 'left' }) }" title="Align Left">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M3 4h18v2H3V4zm0 15h14v2H3v-2zm0-5h18v2H3v-2zm0-5h14v2H3V9z" fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().setTextAlign('center').run()"
                :class="{ 'is-active': editor.isActive({ textAlign: 'center' }) }" title="Align Center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M3 4h18v2H3V4zm2 15h14v2H5v-2zm-2-5h18v2H3v-2zm2-5h14v2H5V9z" fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md" title="right"
                @click="editor.chain().focus().setTextAlign('right').run()"
                :class="{ 'is-active': editor.isActive({ textAlign: 'right' }) }" title="Align Right">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M3 4h18v2H3V4zm4 15h14v2H7v-2zm-4-5h18v2H3v-2zm4-5h14v2H7V9z" fill="rgba(255,255,255,1)" />
                </svg>
            </button>
            <button class="px-1 py-1 text-sm bg-gray-600 rounded-md"
                @click="editor.chain().focus().setTextAlign('justify').run()"
                :class="{ 'is-active': editor.isActive({ textAlign: 'justify' }) }" title="Align Justify">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z" />
                    <path d="M3 4h18v2H3V4zm0 15h18v2H3v-2zm0-5h18v2H3v-2zm0-5h18v2H3V9z" fill="rgba(255,255,255,1)" />
                </svg>
            </button>

        </div>
    </template>

    <!-- The editor -->
    <div x-ref="editor"
        class="mt-1 prose border-2 border-gray-300 rounded-lg max-w-none prose-red prose-purple focus:outline-none focus:ring-2 focus:ring-gray-600 focus:border-transparent">
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
