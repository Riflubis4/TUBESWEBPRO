<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        return view('profile', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login'); // Jika tidak ada user yang login
    }

    // Cara lain untuk mendapatkan pengguna secara eksplisit menggunakan ID
    $user = User::find($user->id);

    if (!$user) {
        return redirect()->route('login');
    }

    $request->validate([
        'phone' => 'nullable|string|max:15',
        'softSkills' => 'nullable|string|max:255',
        'hardSkills' => 'nullable|string|max:255',
    ]);

    // Update menggunakan metode update()
    $user->update([
        'phone' => $request->input('phone'),
        'soft_skills' => $request->input('softSkills'),
        'hard_skills' => $request->input('hardSkills'),
    ]);

    return redirect()->route('profile')->with('success', 'Profile updated successfully.');
}



    
}
