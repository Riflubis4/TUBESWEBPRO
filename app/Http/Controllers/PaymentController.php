<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Workshop;

class PaymentController extends Controller
{
    public function showPaymentForm($eventName, $eventType, $amount)
    {
        // Pass data to the view
        return view('payment', [
            'eventName' => $eventName,
            'eventType' => $eventType,
            'amount' => $amount
        ]);
    }

    public function storePayment(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'workshop_id' => 'required|exists:workshops,id',
            'name' => 'required|string',
            'phone' => 'required|string',
            'payment_method' => 'required|in:transfer,ewallet'
        ]);

        try {
            $workshop = Workshop::findOrFail($request->workshop_id);
            
            // Create new payment
            $payment = new Payment();
            $payment->user = $request->name;  // Mengisi field user dengan nama
            $payment->event_type = $workshop->type;
            $payment->event_name = $workshop->name;
            $payment->amount = $workshop->price;
            $payment->date = now();
            $payment->status = 'pending';  // Set status awal
            $payment->save();

            return redirect()->route('payment.success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Payment failed to process')
                ->withInput();
        }
    }

    public function add($workshop_id)
    {
        try {
            $workshop = Workshop::findOrFail($workshop_id);
            return view('addPayment', compact('workshop'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Workshop not found');
        }
    }

    public function delete($id)
    {
        try {
            $payment = Payment::where('payment_id', $id)->firstOrFail();
            $payment->delete();
            
            return redirect()
                ->back()
                ->with('success', 'Payment successfully deleted');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete payment');
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        $payment->status = $request->status;
        $payment->save();
        
        return redirect()->back();
    }
}
