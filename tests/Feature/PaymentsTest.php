<?php

namespace Tests\Feature;

use App\User;
use App\Payment;
use Tests\TestCase;
use App\Payments\PaymentCodeGenerator;
use App\Payments\FakePaymentCodeGenerator;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function not_authenticated_users_cant_create_a_new_payment()
    {
        $this->withoutExceptionHandling([AuthenticationException::class]);
        $user = factory(User::class)->create();

        $response = $this->get('payments/create');

        $response->assertStatus(302)->assertRedirect('login');
    }

    /** @test */
    public function customer_can_see_a_form_for_creating_new_payment()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();

        $this->actingAs($user)->get('payments/create')
            ->assertStatus(200)
            ->assertSee('Create new payment');
    }


    /** @test */
    public function not_logged_in_user_cant_create_a_new_payment()
    {
        $resposne = $this->json('post', "payments", [
            'email' => 'bradle@cooper.com',
            'amount' => 5000,
            'currency' => 'usd',
            'name' => 'Bradley Cooper',
            'description' => "Pay me. Now",
            'message' => 'Hello',
        ]);

        $resposne->assertStatus(401);
        $this->assertEquals(0, Payment::count());
    }

    /** @test */
    public function user_can_create_a_new_payment()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $fakePaymentCodeGenerator = new FakePaymentCodeGenerator;
        $this->app->instance(PaymentCodeGenerator::class, $fakePaymentCodeGenerator);

        $resposne = $this->actingAs($user)->json('post', "payments", [
            'email' => 'bradle@cooper.com',
            'amount' => 5000,
            'currency' => 'usd',
            'name' => 'Bradley Cooper',
            'description' => "Pay me. Now",
            'message' => 'Hello',
        ]);

        $resposne->assertStatus(200);
        $this->assertEquals(1, Payment::count());
        tap(Payment::first(), function ($payment) use ($user) {
            $this->assertEquals($user->id, $payment->user_id);
            $this->assertEquals('bradle@cooper.com', $payment->email);
            $this->assertEquals(5000, $payment->amount);
            $this->assertEquals('usd', $payment->currency);
            $this->assertEquals('Bradley Cooper', $payment->name);
            $this->assertEquals('Pay me. Now', $payment->description);
            $this->assertEquals('Hello', $payment->message);
            $this->assertEquals('TESTCODE12345', $payment->code);
        });
    }

    /** @test */
    public function email_field_is_required_to_create_a_payment()
    {
        $user = factory(User::class)->create();

        $resposne = $this->actingAs($user)->json('post', "payments", [
            // 'email' => 'bradle@cooper.com',
            'amount' => 5000,
            'currency' => 'usd',
            'name' => 'Bradley Cooper',
            'description' => "Pay me. Now",
            'message' => 'Hello',
        ]);

        $resposne->assertStatus(422);
        $this->assertEquals(0, Payment::count());
        $resposne->assertJsonValidationErrors('email');
    }

    /** @test */
    public function email_field_should_be_a_valid_email_to_create_a_payment()
    {
        $user = factory(User::class)->create();

        $resposne = $this->actingAs($user)->json('post', "payments", [
            'email' => 'not-valid-email',
            'amount' => 5000,
            'currency' => 'usd',
            'name' => 'Bradley Cooper',
            'description' => "Pay me. Now",
            'message' => 'Hello',
        ]);

        $resposne->assertStatus(422);
        $this->assertEquals(0, Payment::count());
        $resposne->assertJsonValidationErrors('email');
    }

    /** @test */
    public function amount_field_should_be_integer_to_create_a_payment()
    {
        $user = factory(User::class)->create();

        $resposne = $this->actingAs($user)->json('post', "payments", [
            'email' => 'not-valid-email',
            'amount' => 'some-amount',
            'currency' => 'usd',
            'name' => 'Bradley Cooper',
            'description' => "Pay me. Now",
            'message' => 'Hello',
        ]);

        $resposne->assertStatus(422);
        $this->assertEquals(0, Payment::count());
        $resposne->assertJsonValidationErrors('amount');
    }
}
