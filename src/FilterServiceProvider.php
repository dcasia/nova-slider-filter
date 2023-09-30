<?php

namespace DigitalCreative\NovaRangeFilter;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FilterServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-range-filter', __DIR__ . '/../dist/js/filter.js');
            Nova::style('nova-range-filter', __DIR__ . '/../dist/css/filter.css');
        });
    }
}
