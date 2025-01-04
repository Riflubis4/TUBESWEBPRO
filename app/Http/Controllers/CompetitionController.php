<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Payment;

class CompetitionController extends Controller
{
    // Menampilkan kompetisi non-akademik
    public function showNonAcademicCompetitions()
    {
        $competitions = Competition::where('type', 'non-academic')->get();
        return view('competitionNonAcademic', compact('competitions'));
    }

    // Menampilkan detail kompetisi
    public function show($id)
{
    try {
        $competition = Competition::findOrFail($id);
        $payment = Payment::where([
            'event_name' => $competition->name,
            'event_type' => $competition->type,
            'status' => 'completed'
        ])->first();
        
        return view('CompetitionDetail', compact('competition', 'payment'));
        
    } catch (\Exception $e) {
        return abort(404);
    }
}
    // Inisiasi pembayaran kompetisi
    public function initiatePayment(Request $request, $id)
    {
        $competition = Competition::findOrFail($id);
        return view('addPayment', [
            'competition' => $competition,
            'amount' => $competition->entry_fee, // Gunakan entry_fee untuk konsistensi
        ]);
    }

    // Memperbarui data kompetisi
    public function update(Request $request)
{
    try {
        $competition = Competition::find($request->competitionId);
        
        $competition->update([
            'name' => $request->competitionName,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'entry_fee' => $request->entry_fee,
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Competition updated successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating competition: ' . $e->getMessage());
    }
}


}
