<?php

namespace App\Partials;

use App\Contracts\Partial;

class UserPartial extends Partial
{
	public function namePartial()
	{
		return $this->builder->addSelect('name');
	}
}