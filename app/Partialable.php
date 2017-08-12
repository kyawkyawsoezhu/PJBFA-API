<?php
namespace App;

use App\Partials\Partial;
use App\Partials\DefaultPartial;

trait Partialable
{
    public function scopePartial($query, Partial $partial)
    {
        return request()->has('fields') ? $partial->apply($query) : $query;
    }
}