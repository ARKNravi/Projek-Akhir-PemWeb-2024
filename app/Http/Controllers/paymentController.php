<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;


class PaymentController extends Controller
{
    public function store(Request $request){
        $payment = new Payment;
        $payment->id=$request->id;
        $payment->nominal_pembayaran=$request->nominal_pembayaran;
        $payment->metode_pembayatan=$request->metode_pembayaran;
        $payment->save();
    }
}
