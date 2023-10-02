<?php

declare(strict_types = 1);

namespace DigitalCreative\NovaRangeFilter;

use Laravel\Nova\Filters\Filter;

abstract class SliderFilter extends Filter
{
    public $component = 'nova-slider-filter';

    public function range(int ...$values): self
    {
        sort($values);

        return $this->withMeta([ 'mode' => 'range', 'min' => min($values), 'max' => max($values), 'values' => $values ]);
    }

    public function single(int $min, int $max): self
    {
        return $this->withMeta([ 'mode' => 'single', 'min' => $min, 'max' => $max ]);
    }

    public function interval(int $value): self
    {
        return $this->withMeta([  'interval' => $value ]);
    }

    public function minRange(int $min): self
    {
        return $this->withMeta([ 'minRange' => $min ]);
    }

    public function maxRange(int $max): self
    {
        return $this->withMeta([ 'maxRange' => $max ]);
    }

    /**
     * Possible values: none, hover, always, active
     */
    public function tooltip(string $type = 'always'): self
    {
        return $this->withMeta([ 'tooltip' => $type ]);
    }

    /**
     * @see https://nightcatsama.github.io/vue-slider-component/#/basics/marks
     */
    public function marks(array|bool $marks): self
    {
        return $this->withMeta([ 'marks' => $marks ]);
    }

    public function enableCross(): self
    {
        return $this->withMeta([ 'enableCross' => true ]);
    }

    public function disableMinMaxLabels(): self
    {
        return $this->withMeta([ 'disableMinMaxLabels' => true ]);
    }

    public function label(string $label): self
    {
        return $this->withMeta([ 'label' => $label ]);
    }
}
