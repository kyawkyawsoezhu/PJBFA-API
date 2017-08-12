<?php

namespace App\Models;

use App\Traits\Filterable;
use App\Traits\Partialable;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use Filterable, Partialable;

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
