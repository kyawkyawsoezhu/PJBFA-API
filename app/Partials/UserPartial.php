<?php

namespace App\Partials;

class UserPartial extends Partial
{
	public function namePartial()
	{
		return $this->builder->addSelect('name');
	}
}