<?php

namespace App\Filters;

class OfficeFilter extends Filter{

	public function select($value){
		return $this->builder->select($value);
	}

	public function title($value){
		return $this->builder->where('title', $value);
	}

	public function year($year){
		return $this->builder->whereYear('created_at', $year);
	}

	public function month($month){
		return $this->builder->whereMonth('created_at', $month);
	}

	public function day($day){
		return $this->builder->whereDay('created_at', $day);
	}

	public function amount($value){
		return $this->builder->where('title', $value);
	}

}