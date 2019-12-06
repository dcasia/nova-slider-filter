<?php

namespace DigitalCreative\NovaRangeFilter;

use Illuminate\Database\Eloquent\Builder;
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
     * @param Request $request
     * @param Builder $query
     * @param mixed $value
     *
     * @return Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query;
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
