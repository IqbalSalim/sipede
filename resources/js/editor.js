import {
    Editor
} from '@tiptap/core';
import StarterKit from '@tiptap/starter-kit';
import Table from '@tiptap/extension-table';
import TableRow from '@tiptap/extension-table-row';
import TableCell from '@tiptap/extension-table-cell';
import TableHeader from '@tiptap/extension-table-header';
import TextAlign from '@tiptap/extension-text-align';
import Highlight from '@tiptap/extension-highlight';


window.setupEditor = function () {
    return {
        editor: null,
        init(element) {
            this.editor = new Editor({
                element: element,
                extensions: [
                    StarterKit,
                    Table.configure({
                        resizable: true,
                    }),
                    TableRow,
                    TableHeader,
                    TableCell,
                    TextAlign.configure({
                        types: ['heading', 'paragraph'],
                    }),
                    Highlight,
                ],
                content: this.content,
                onUpdate: ({
                    editor
                }) => {
                    this.content = editor.getHTML()
                }
            })
        },
    }
}
