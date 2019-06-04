<?php

namespace Tests\Feature;

use App\Payment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    /** @test */
    public function not_authenticated_users_can_not_see_dashboard()
    {
        $this->get('/')->assertRedirect('login');
    }

    /** @test */
    public function it_retrieves_last_3_payments_of_each_type()
    {
        $paymentA = factory(Payment::class)->create([]);
    }
}
