# Nova Slider Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-slider-filter)](https://github.com/dcasia/nova-slider-filter/blob/master/LICENSE)

A Laravel Nova filter that renders into clickable pills.

![SliderFilter in Action](https://raw.githubusercontent.com/dcasia/nova-slider-filter/master/screenshot.png)

# Installation

You can install the package via composer:

```
composer require digital-creative/nova-slider-filter
```

## Basic Usage

Create a filter as usual and extend the `DigitalCreative\SliderFilter\SliderFilter` class

```php
use DigitalCreative\SliderFilter\SliderFilter;

class MyFilter extends SliderFilter {

    public function apply(Request $request, $query, $values)
    {
        // $values will always be an array
    }
    
    public function options(Request $request)
    {
        return [
           'Display Text 1' => 'value-1',
           'Display Text 2' => 'value-2'
        ];
    }

}
```

and use it as usual on the filters methods within your resource class:

```php
class ExampleNovaResource extends Resource {

    public function filters(Request $request)
    {
        return [
            new MyFilter()
        ];
    }

}
```

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-slider-filter/master/LICENSE) for more information.
