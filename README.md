# Nova Slider Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-slider-filter)](https://github.com/dcasia/nova-slider-filter/blob/main/LICENSE)

A Laravel Nova filter for picking range between a min/max value.

<picture>
  <source media="(prefers-color-scheme: dark)" srcset="https://raw.githubusercontent.com/dcasia/nova-slider-filter/main/screenshots/dark.png">
  <img alt="SliderFilter in Action" src="https://raw.githubusercontent.com/dcasia/nova-slider-filter/main/screenshots/light.png">
</picture>

# Installation

You can install the package via composer:

```shell
composer require digital-creative/nova-slider-filter
```

## Basic Usage

Create a filter as usual and extend the `DigitalCreative\SliderFilter\SliderFilter` class

```php
use DigitalCreative\SliderFilter\SliderFilter;

class MyFilter extends SliderFilter {

    public function apply(NovaRequest $request, $query, $values)
    {
        // $values will be an array when using ->range() and int when using ->single()
    }
    
}
```

and use it as usual on the filters methods within your resource class:

```php
class ExampleNovaResource extends Resource {

    public function filters(NovaRequest $request): array
    {
        return [
            MyFilter::make()->single(min: 0, max: 100),
        ];
    }

}
```

Calling the `->range()` method will render a slider with two (or more) handles, while calling the `single()` method will render a slider with a single handle.

```php
class ExampleNovaResource extends Resource {

    public function filters(NovaRequest $request): array
    {
        return [
            MyFilter::make()
                ->range(0, 500, 300)
                ->label('${value}')
                
            MyFilter::make()
                ->single(min: 0, max: 500)
                ->label('${value}')
        ];
    }

}
```

You can also set marks on the slider by using the `->marks()` method. The method accepts an array of key/value pairs where the key is the value of the mark and the value is the label to be displayed.

```php
class ExampleNovaResource extends Resource {

    public function filters(NovaRequest $request): array
    {
        return [
            MyFilter::make()
                ->single(0, 100)
                ->marks([
                    '0' => '🌑',
                    '50' => '🌓',
                    '100' => '🌕'
                ])
        ];
    }

}
```

## ⭐️ Show Your Support

Please give a ⭐️ if this project helped you!

### Other Packages You Might Like

- [Nova Dashboard](https://github.com/dcasia/nova-dashboard) - The missing dashboard for Laravel Nova!
- [Nova Welcome Card](https://github.com/dcasia/nova-welcome-card) - A configurable version of the `Help card` that comes with Nova.
- [Icon Action Toolbar](https://github.com/dcasia/icon-action-toolbar) - Replaces the default boring action menu with an inline row of icon-based actions.
- [Expandable Table Row](https://github.com/dcasia/expandable-table-row) - Provides an easy way to append extra data to each row of your resource tables.
- [Collapsible Resource Manager](https://github.com/dcasia/collapsible-resource-manager) - Provides an easy way to order and group your resources on the sidebar.
- [Resource Navigation Tab](https://github.com/dcasia/resource-navigation-tab) - Organize your resource fields into tabs.
- [Resource Navigation Link](https://github.com/dcasia/resource-navigation-link) - Create links to internal or external resources.
- [Nova Mega Filter](https://github.com/dcasia/nova-mega-filter) - Display all your filters in a card instead of a tiny dropdown!
- [Nova Pill Filter](https://github.com/dcasia/nova-pill-filter) - A Laravel Nova filter that renders into clickable pills.
- [Nova Slider Filter](https://github.com/dcasia/nova-slider-filter) - A Laravel Nova filter for picking range between a min/max value.
- [Nova Range Input Filter](https://github.com/dcasia/nova-range-input-filter) - A Laravel Nova range input filter.
- [Nova FilePond](https://github.com/dcasia/nova-filepond) - A Nova field for uploading File, Image and Video using Filepond.
- [Custom Relationship Field](https://github.com/dcasia/custom-relationship-field) - Emulate HasMany relationship without having a real relationship set between resources.
- [Column Toggler](https://github.com/dcasia/column-toggler) - A Laravel Nova package that allows you to hide/show columns in the index view.
- [Batch Edit Toolbar](https://github.com/dcasia/batch-edit-toolbar) - Allows you to update a single column of a resource all at once directly from the index page.

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-slider-filter/master/LICENSE) for more information.
