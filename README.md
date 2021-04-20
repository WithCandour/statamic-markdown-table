# Statamic Markdown Table

![Statamic 3.0+](https://img.shields.io/badge/Statamic-3.0+-FF269E?style=for-the-badge&link=https://statamic.com)

Adds more functionality to your Statamic tables by letting you use a markdown field to add content. 

## Installation

#### Install via composer:
```
composer require withcandour/statamic-markdown-table
```
Then publish the publishables from the service provider:
```
php artisan vendor:publish --provider="WithCandour\MarkdownTable\ServiceProvider"
```

## Usage

### Blueprints
You may drop a markdown table fieldtype into any new or existing blueprint by selecting it from the fieldtype list. You will have all the [markdown config options](https://statamic.dev/fieldtypes/markdown#config-options) available to you so you may control how the markdown gets parsed before the table cells are added to your view.

### Templating
The markdown table fieldtype will produce data in exactly the same way as the table fieldtype so you may either use the `table` modifier or use the more verbose option of looping over the cells.

Documentation on templating with the table fieldtype can be found in the [Statamic docs](https://statamic.dev/fieldtypes/markdown#config-options)
