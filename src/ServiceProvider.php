<?php

namespace WithCandour\MarkdownTable;

use Statamic\Providers\AddonServiceProvider;
use WithCandour\MarkdownTable\Fieldtypes\MarkdownTable;

class ServiceProvider extends AddonServiceProvider
{
    /**
     * @var array
     */
    protected $fieldtypes = [
        MarkdownTable::class
    ];

    /**
     * @var array
     */
    protected $scripts = [
        __DIR__ . '/../public/js/markdown-table.js',
    ];

    /**
     * @var array
     */
    protected $stylesheets = [
        __DIR__ . '/../public/css/markdown-table.css',
    ];
}
