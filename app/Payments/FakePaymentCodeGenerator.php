<?php

namespace App\Payments;

class FakePaymentCodeGenerator implements PaymentCodeGenerator
{
    public function generate()
    {
        return 'TESTCODE12345';
    }
}
