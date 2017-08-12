<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spend extends Model
{
    protected $fillable = [
        'title', 'amount', 'currency', 'note', 'spend_date', 'spend_for_type', 'spend_for_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function spendForType()
    {
    	return $this->morphTo('spend_for');
    }

}
