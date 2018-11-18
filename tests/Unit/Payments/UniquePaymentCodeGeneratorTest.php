<?php

namespace Tests\Unit\Payments;

use Tests\TestCase;
use App\Payments\UniquePaymentCodeGenerator;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UniquePaymentCodeGeneratorTest extends TestCase
{
    // code must be 16 characters long
    // it can only contain uppercase letters and numbers
    // it must be inique

    /** @test */
    public function it_must_be_16_charactesr_long()
    {
        $generator = new UniquePaymentCodeGenerator;

        $code = $generator->generate();

        $this->assertEquals(16, strlen($code));
    }

    /** @test */
    public function it_can_only_contain_uppercase_letters_and_numbers()
    {
        $generator = new UniquePaymentCodeGenerator;

        $code = $generator->generate();

        $this->assertRegExp('/^[A-Z0-9]*$/', $code);
    }

    /** @test */
    public function code_must_be_unique()
    {
        $codes = collect();
        for ($i=0; $i < 1000; $i++) {
            $codes->push((new UniquePaymentCodeGenerator)->generate());
        }

        $this->assertEquals($codes->count(), $codes->unique()->count());
    }
}
