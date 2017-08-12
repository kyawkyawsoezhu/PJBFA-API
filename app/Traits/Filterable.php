<?php

namespace App\Traits;

use App\Contracts\Filter;

trait Filterable
{
    public function scopeFilter($query ,Filter $filter) {
        $filter->apply($query);
    }    
}
