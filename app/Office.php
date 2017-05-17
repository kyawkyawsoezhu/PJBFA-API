<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use Filterable;

	protected $fillable = [
        'title', 'description'
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
