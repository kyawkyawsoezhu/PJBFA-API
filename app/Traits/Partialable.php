<?php
namespace App\Traits;

use App\Contracts\Partial;

trait Partialable
{
    public function scopePartial($query, Partial $partial)
    {
        return request()->has('fields') ? $partial->apply($query) : $query;
    }
}