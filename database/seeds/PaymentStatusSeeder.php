<?php

use App\PaymentStatus;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PaymentStatus::class)->create([
            'code' => 'new',
            'label' => 'New',
            'description' => 'This status represents that payment has been created but never sent.',
        ]);
    }
}
