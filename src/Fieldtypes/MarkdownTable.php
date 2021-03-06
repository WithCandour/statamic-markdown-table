<?php

namespace WithCandour\MarkdownTable\Fieldtypes;

use Statamic\Fields\Fieldtype;

class MarkdownTable extends Fieldtype
{
    /**
     * @var string
     */
    protected $icon = 'table';

    /**
     * @var array
     */
    protected function configFieldItems(): array
    {
        return [
            'container' => [
                'display' => __('Container'),
                'instructions' => __('statamic::fieldtypes.markdown.config.container'),
                'type' => 'asset_container',
                'max_items' => 1,
                'width' => 50,
            ],
            'folder' => [
                'display' => __('Folder'),
                'instructions' => __('statamic::fieldtypes.markdown.config.folder'),
                'type' => 'asset_folder',
                'max_items' => 1,
                'width' => 50,
            ],
            'restrict' => [
                'display' => __('Restrict'),
                'instructions' => __('statamic::fieldtypes.markdown.config.restrict'),
                'type' => 'toggle',
                'width' => 50,
            ],
            'automatic_line_breaks' => [
                'display' => __('Automatic Line Breaks'),
                'instructions' => __('statamic::fieldtypes.markdown.config.automatic_line_breaks'),
                'type' => 'toggle',
                'default' => true,
                'width' => 50,
            ],
            'automatic_links' => [
                'display' => __('Automatic Links'),
                'instructions' => __('statamic::fieldtypes.markdown.config.automatic_links'),
                'type' => 'toggle',
                'default' => false,
                'width' => 50,
            ],
            'escape_markup' => [
                'display' => __('Escape Markup'),
                'instructions' => __('statamic::fieldtypes.markdown.config.escape_markup'),
                'type' => 'toggle',
                'default' => false,
                'width' => 50,
            ],
        ];
    }

    /**
     * Augment the table value and automatically parse the markdown from the config
     *
     * @param array|null $table
     * @return string
     */
    public function augment($table)
    {
        if (is_null($table) || count($table) < 1) {
            return;
        }

        $table = collect($table)->map(function($row) {

            if(!is_null($row['cells']) && count($row['cells'])  > 0) {
                $cells = collect($row['cells'])->map(function($value) {
                    $markdown = \Statamic\Facades\Markdown::parser(
                        $this->config('parser', 'default')
                    );

                    if ($this->config('automatic_line_breaks')) {
                        $markdown = $markdown->withAutoLineBreaks();
                    }

                    if ($this->config('escape_markup')) {
                        $markdown = $markdown->withMarkupEscaping();
                    }

                    if ($this->config('automatic_links')) {
                        $markdown = $markdown->withAutoLinks();
                    }

                    if ($this->config('smartypants')) {
                        $markdown = $markdown->withSmartPunctuation();
                    }

                    $html = $markdown->parse((string) $value);

                    return $html;
                });

                $row['cells'] = $cells;
            }

            return $row;
        });

        return $table;
    }
}
