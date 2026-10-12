<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function getCustomer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
