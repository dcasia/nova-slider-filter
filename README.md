# Nova Slider Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-slider-filter)](https://github.com/dcasia/nova-slider-filter/blob/master/LICENSE)

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

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-slider-filter/master/LICENSE) for more information.
