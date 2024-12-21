<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store()
    {
        // Check if session data exists
        if (session()->has(['transaction_id', 'item_name', 'amount', 'currency', 'status', 'payer_id', 'payer_email', 'payer_name'])) {

            // Insert the data into the database
            Payment::create([
                'transaction_id' => session('transaction_id'),
                'item_name' => session('item_name'),
                'amount' => session('amount'),
                'currency' => session('currency'),
                'status' => session('status'),
                'payer_id' => session('payer_id'),
                'payer_email' => session('payer_email'),
                'payer_name' => session('payer_name'),
            ]);

            // Clear the session data after storing
            session()->forget(['transaction_id', 'item_name', 'amount', 'currency', 'status', 'payer_id', 'payer_email', 'payer_name']);
        }

        // Redirect to success page
        return view('website.success');
    }
}
