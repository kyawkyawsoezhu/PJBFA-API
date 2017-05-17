<?php

namespace App;

use App\Filters\Filter;

trait Filterable
{
    public function scopeFilter($query ,Filter $filter) {
        $filter->apply($query);
    }    
}
