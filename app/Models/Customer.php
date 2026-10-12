<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // one to one
    public function getCredentials()
    {
        return $this->hasOne(Credential::class);
    }

    // one to many
    public function getAccounts()
    {
        return $this->hasMany(Account::class);
    }

    // many to many
    public function getServices()
    {
        return $this->belongsToMany(Service::class, 'customer_services', 'customer_id', 'service_id');
    }
}
