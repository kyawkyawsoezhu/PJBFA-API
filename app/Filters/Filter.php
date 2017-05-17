<?php

namespace App\Filters;

use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Http\Request;

abstract class Filter {
	
	protected $builder;

	protected $request;

	public function __construct(Request $request){
		$this->request = $request;
	}

	public function apply(Builder $builder){
		$this->builder = $builder;

		foreach ($this->request->query() as $key => $value) {

			$method_name = camel_case($key);

			if(method_exists($this, $method_name) && !empty($value)) {
				$this->$method_name($value);
			}

		}

		return $this->builder;
	}

}