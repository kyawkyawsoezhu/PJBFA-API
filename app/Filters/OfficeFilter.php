<?php

namespace App\Filters;

use App\Contracts\Filter;

class OfficeFilter extends Filter{

	public function selectFilter($value){
		return $this->builder->select($value);
	}

	public function titleFilter($value){
		return $this->builder->where('title', $value);
	}

	public function yearFilter($year){
		return $this->builder->whereYear('created_at', $year);
	}

	public function monthFilter($month){
		return $this->builder->whereMonth('created_at', $month);
	}

	public function dayFilter($day){
		return $this->builder->whereDay('created_at', $day);
	}

	public function amountFilter($value){
		return $this->builder->where('title', $value);
	}

    public function limitFilter($value)
    {
        $this->model->setPerPage((int)$value);
    }

    public function sortFilter($value)
    {
        $sortable = ['id', 'title', 'description', 'user_id', 'created_at', 'updated_at'];
        $this->orderBy($sortable, $value);
    }
}