import QuillBetterTable from 'quill-better-table'

QuillBetterTable.register({
    'modules/better-table': QuillBetterTable
}, true)

window.onload = () => {
    const quill = new Quill('#editor-wrapper', {
        theme: 'snow',
        modules: {
            table: false, // disable table module
            'better-table': {
                operationMenu: {
                    items: {
                        unmergeCells: {
                            text: 'Another unmerge cells name'
                        }
                    }
                }
            },
            keyboard: {
                bindings: QuillBetterTable.keyboardBindings
            }
        }
    })

    document.body.querySelector('#insert-table')
        .onclick = () => {
            let tableModule = quill.getModule('better-table')
            tableModule.insertTable(3, 3)
        }
}
