<?php

namespace DigitalCreative\NovaRangeFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SliderFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'nova-slider-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $value
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query;
    }

    /**
     * Get the filter's available options.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function options(Request $request)
    {
        return [];
    }

    public function minValue(int $min): self
    {
        return $this->withMeta([ 'min' => $min ]);
    }

    public function maxValue(int $max): self
    {
        return $this->withMeta([ 'max' => $max ]);
    }

    public function label(string $label = '万'): self
    {
        return $this->withMeta([ 'label' => $label ]);
    }

}
