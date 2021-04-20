import MarkdownTable from './components/Fieldtypes/MarkdownTable';

Statamic.booting(() => {
    Statamic.component('markdown_table-fieldtype', MarkdownTable);
});
