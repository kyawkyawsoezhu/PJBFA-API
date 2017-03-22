<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function spends()
    {
    	return $this->morphMany(Spend::class, 'spend_for');
    }
}
