## Introduction

### Nova Range Filter

A custom vue component that fully supports filtering over a range of values based on [Vue Slider Component](https://github.com/NightCatSama/vue-slider-component)

## Installation

You can install the package into a Laravel application that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require oleksiypetlyuk/nova-range-filter
```

## Usage

Just use the `Oleksiypetlyuk\NovaRangeFilter\NovaRangeFilter` field in your Nova filter:

``` php

<?php

namespace App\Nova\Filters\Profile;

use App\Models\Profile\Profile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Oleksiypetlyuk\NovaRangeFilter\NovaRangeFilter;

class HourlyPriceFilter extends NovaRangeFilter
{
    public $name = 'Price range';

    public function __construct()
    {
        $this->min = floor(Profile::min('hourly_price'));

        $this->max = ceil(Profile::max('hourly_price'));

        parent::__construct();
    }

    /**
     * Apply the filter to the given query.
     *
     * @param  Request $request
     * @param  Builder $query
     * @param  mixed $value
     * @return Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->whereBetween('hourly_price', $value)
            ->orWhereNull('hourly_price');
    }
}

```

# Contributions

All contributions (big or small) are highly welcomed. Send a PR

# Authors

* Oleksiy Petlyuk <oleksiy.petlyuk94@gmail.com>

# Support

If you would love to support the continuous development and maintenance of this package, please consider buying me a coffee.

<a href="https://www.buymeacoffee.com/b9ksSETNX" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: auto !important;width: auto !important;" ></a>

# License

This package is open-sourced software licensed under the [MIT Licence](https://github.com/oleksiyPetlyuk/nova-range-filter/blob/master/LICENSE)
