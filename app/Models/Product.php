<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function getProductsSortByAvailability()
    {
        return static::orderBy('availability', 'DESC')
            ->paginate(10);
    }
    public static function getProductsSortByAvailabilityAndColumn($sorting)
    {
        return static::orderByRaw('availability DESC,'.$sorting.' ASC')
            ->paginate(10);
    }
}
