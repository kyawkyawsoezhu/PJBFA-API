<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
        'user_id', 'provider_type', 'provider_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function findByProviderTypeAndID($provider_type, $provider_id)
    {
        return $this->where(compact('provider_type', 'provider_id'))->first();
    }

}
