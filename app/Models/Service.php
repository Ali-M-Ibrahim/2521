<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function getCustomers()
    {
        return $this->belongsToMany(Customer::class, 'customer_services', 'service_id', 'customer_id');
    }
}
