<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Payment;


class WorkshopController extends Controller
{
    public function showAcademicWorkshop()
    {
        // return view('workshopAcademic'); // Menampilkan workshopAcademic.blade.php
        $workshops = Workshop::where('type', 'academic')->get();
        return view('workshopAcademic', compact('workshops'));
    }

    public function show($id)
    {
        $workshop = Workshop::findOrFail($id);
        $payment = Payment::where([
            'event_name' => $workshop->name,
            'event_type' => $workshop->type,
            'status' => 'completed'
        ])->first();
        
        return view('workshopDetail', compact('workshop', 'payment'));
    }

    public function initiatePayment(Request $request, $id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('addPayment', [
            'workshop' => $workshop,
            'amount' => $workshop->price,
        ]);
    }

    public function update(Request $request)
    {
        $workshop = Workshop::find($request->workshopId);
        
        $workshop->update([
            'name' => $request->workshopName,
            'type' => $request->workshopType,
            'date' => $request->workshopDate,
            'price' => $request->workshopPrice,
            'capacity' => $request->workshopCapacity,
            'status' => $request->workshopStatus
        ]);

        return redirect()->back()->with('success', 'Workshop updated successfully');
    }
}