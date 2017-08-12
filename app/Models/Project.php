<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	protected $fillable = [
        'title', 'description', 'date'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function spends()
    {
    	return $this->morphMany(Spend::class, 'spend_for');
    }
}
