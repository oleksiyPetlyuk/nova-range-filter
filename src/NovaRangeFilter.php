<?php

namespace Oleksiypetlyuk\NovaRangeFilter;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

abstract class NovaRangeFilter extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'nova-range-filter';

    /**
     * Slider min value
     *
     * @var int
     */
    public $min = 0;

    /**
     * Slider max value
     *
     * @var int
     */
    public $max = 100;

    /**
     * Slider interval value
     *
     * @var int
     */
    public $interval = 1;

    /**
     * Slider tooltip behaviour
     *
     * @var string
     */
    public $tooltip = 'always';

    /**
     * Slider default value
     *
     * @var array
     */
    public $default;

    public function __construct()
    {
        $this->default = [$this->min, $this->max];
    }

    /**
     * Get the filter's available options.
     *
     * @param  Request $request
     * @return array
     */
    public function options(Request $request)
    {
        return [
            'min' => $this->min,
            'max' => $this->max,
            'interval' => $this->interval,
            'tooltip' => $this->tooltip,
        ];
    }

    /**
     * Set the default options for the filter.
     *
     * @return array
     */
    public function default()
    {
        return $this->default;
    }
}
