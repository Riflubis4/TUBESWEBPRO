<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSignup;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function showRegistrationForm()
   {
       return view('Signup');
   }

   
public function register(Request $request)
{
    $request->validate([
        'firstname' => 'required|string|max:50',
        'lastname' => 'required|string|max:50',
        'email' => 'required|string|email|max:100|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $roleId = str_ends_with($request->email, '@admin.ac.id') ? '1' : '2';

    UserSignup::create([
        'first_name' => $request->firstname,
        'last_name' => $request->lastname,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $roleId
    ]);

    return redirect()->route('signup.success');
}
}

