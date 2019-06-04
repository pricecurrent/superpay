<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    const NEW = 1;

    /**
     * Properties that should be guarded from mass assignment
     * @var array
     */
    protected $guarded = [];
}
