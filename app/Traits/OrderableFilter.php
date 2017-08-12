<?php

namespace App\Traits;

trait OrderableFilter
{
    public function orderBy($sortable, $value)
    {
        $direction = 'asc';

        if (strpos($value, ':') !== false) {
            list($value, $direction) = explode(':', $value);
        }

        if (in_array($value, $sortable)) {
            $this->builder->orderBy($value, $direction);
        }
    }
}