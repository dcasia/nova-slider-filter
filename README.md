# Nova Slider Filter

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![Total Downloads](https://img.shields.io/packagist/dt/digital-creative/nova-slider-filter)](https://packagist.org/packages/digital-creative/nova-slider-filter)
[![License](https://img.shields.io/packagist/l/digital-creative/nova-slider-filter)](https://github.com/dcasia/nova-slider-filter/blob/master/LICENSE)

A Laravel Nova filter for picking range between a min/max value.

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
        [ $min, $max ] = $values;   
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

You can configure the min/max values as well as the tooltip suffix by calling:

```php
class ExampleNovaResource extends Resource {

    public function filters(Request $request)
    {
        return [
            (new MyFilter())->minValue(0)
                            ->maxValue(1000)
                            ->label('$')
        ];
    }

}
```

## License

The MIT License (MIT). Please see [License File](https://raw.githubusercontent.com/dcasia/nova-slider-filter/master/LICENSE) for more information.
