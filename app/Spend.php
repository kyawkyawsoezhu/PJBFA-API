<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function spendForType()
    {
    	return $this->morphTo('spend_for');
    }

}
