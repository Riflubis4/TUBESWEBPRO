<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use App\Models\Competition;
use App\Models\Payment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard()
    {
        // Mengambil semua data workshop, competition, dan payment dari database
        $workshops = Workshop::all();
        $competitions = Competition::all();
        $payments = Payment::all();

        // Mengirimkan data ke view admin.dashboard
        return view('dashboardAdmin', compact('workshops', 'competitions', 'payments'));
    }

    // Workshop Methods
    public function editWorkshop($id)
    {
        $workshop = Workshop::findOrFail($id);
        return view('admin.editWorkshop', compact('workshop'));
    }

    public function destroyWorkshop($id)
    {
        $workshop = Workshop::findOrFail($id);
        $workshop->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Workshop deleted successfully');
    }

    public function storeWorkshop(Request $request)
    {
        $request->validate([
            'workshopName' => 'required|string|max:255',
            'workshopDate' => 'required|date',
            'workshopPrice' => 'required|numeric',
            'workshopCapacity' => 'required|integer',
        ]);

        Workshop::create([
            'name' => $request->workshopName,
            'date' => $request->workshopDate,
            'price' => $request->workshopPrice,
            'capacity' => $request->workshopCapacity,
            'status' => 'active',
            'type' => 'academic'
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Workshop added successfully');
    }

    // Competition Methods
    public function editCompetition($id)
    {
        $competition = Competition::findOrFail($id);
        return view('admin.editCompetition', compact('competition'));
    }

    public function destroyCompetition($id)
    {
        $competition = Competition::findOrFail($id);
        $competition->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Competition deleted successfully');
    }

    public function storeCompetition(Request $request)
    {
        // Validasi dan menyimpan data competition
        $request->validate([
            'competitionName' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
            'entryFee' => 'required|numeric',
        ]);

        Competition::create([
            'name' => $request->competitionName,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'entry_fee' => $request->entryFee,
            'status' => 'active', // default status
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Competition added successfully');
    }

    // Payment Methods
    public function updatePayment($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        return view('admin.updatePayment', compact('payment'));
    }

    public function destroyPayment($paymentId)
    {
        $payment = Payment::findOrFail($paymentId);
        $payment->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Payment record deleted successfully');
    }
}
