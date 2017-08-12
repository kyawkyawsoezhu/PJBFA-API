<?php

namespace App\Contracts;

use App\Traits\OrderableFilter;
use \Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Http\Request;

abstract class Filter {

    use OrderableFilter;

    protected $builder;
    protected $request;
    protected $model;

	public function __construct(Request $request){
		$this->request = $request;
	}

    public function apply(Builder $builder, Model $model)
    {
        $this->builder = $builder;
        $this->model = $model;

        foreach ($this->filter() as $field => $value) {
            $method = camel_case($field) . 'Filter';
            $this->{$method}($value);
        }

        return $this->builder;
    }

    public function filter()
    {
        return array_filter($this->request->all(), function ($field) {
            $method = camel_case($field) . 'Filter';
            return method_exists($this, $method);
        }, ARRAY_FILTER_USE_KEY);
    }

}