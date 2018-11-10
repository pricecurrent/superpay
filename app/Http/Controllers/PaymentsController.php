<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Payments\PaymentCodeGenerator;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'amount' => 'required|integer|min:100'
        ]);

        $payment = $request->user()->payments()->create([
            'amount' => $request->amount,
            'currency' => $request->currency,
            'email' => $request->email,
            'name' => $request->name,
            'description' => $request->description,
            'message' => $request->message,
            'code' => app(PaymentCodeGenerator::class)->generate(),
        ]);
    }
}
