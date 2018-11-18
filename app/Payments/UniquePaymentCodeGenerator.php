<?php

namespace App\Payments;

use App\Payments\PaymentCodeGenerator;

class UniquePaymentCodeGenerator implements PaymentCodeGenerator
{
    public function generate()
    {
        $pool = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 16)), 0, 16);
    }
}
