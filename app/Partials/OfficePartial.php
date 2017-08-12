<?php

namespace App\Partials;

use App\Contracts\Partial;

class OfficePartial extends Partial
{
	public function idPartial()
	{
		$this->builder->addSelect('id');	
	}

	public function titlePartial()
	{
		$this->builder->addSelect('title');	
	}

	public function userPartial($fields)
	{
		$this->builder->addSelect('user_id');
		if(empty($fields)){
			$this->builder->with('user');
		}else{
			$this->builder->with(['user' => function($query) use ($fields){
				return $query->addSelect('id')->partial(new UserPartial($fields));
			}]);
		}
	}

	public function spendsPartial($fields)
	{
		$this->builder->with('spends');	
	}

}