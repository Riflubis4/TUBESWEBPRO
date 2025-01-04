<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('home');
})->name('home');

Route::get('/about', function () {
   return view('about');
})->name('about');

Route::get('/help', function () {
   return view('help');
})->name('help');

// Login Routes
// Route::get('/LoginPage', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::match(['get', 'post'], '/LoginPage', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Signup Routes  
Route::get('/Signup', [RegisterController::class, 'showRegistrationForm'])->name('signup.form');
Route::post('/Signup', [RegisterController::class, 'register'])->name('register');
Route::get('/signup/success', function () {
   return view('auth.signupSuccess');
})->name('signup.success');

// Dashboard Routes with middleware 'auth'
Route::middleware('auth')->group(function () {
   // Dashboard untuk Admin
   Route::get('/dashboard/admin', function () {
       return view('dashboardAdmin');
   })->name('admin.dashboard');

   // Dashboard untuk User biasa
   Route::get('/dashboard/user', function () {
       $workshops = \App\Models\Workshop::all();
       return view('dashboardUser', compact('workshops'));
   })->name('user.dashboard');

   // Logout route
   Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('admin')->middleware('auth')->group(function () {
   Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
   
   // Workshop Routes
   Route::post('/workshop/store', [AdminController::class, 'storeWorkshop'])->name('workshop.store');
   Route::delete('/workshop/delete/{id}', [AdminController::class, 'destroyWorkshop'])->name('workshop.delete');
   Route::get('/workshop/edit/{id}', [AdminController::class, 'editWorkshop'])->name('workshop.edit');
   Route::put('/workshop/update', [WorkshopController::class, 'update'])->name('workshop.update');
   
   // Competition Routes
   Route::post('/competition/store', [AdminController::class, 'storeCompetition'])->name('competition.store');
   Route::delete('/competition/delete/{id}', [AdminController::class, 'destroyCompetition'])->name('competition.delete');
   Route::get('/competition/edit/{id}', [AdminController::class, 'editCompetition'])->name('competition.edit');
   Route::put('/competition/update', [CompetitionController::class, 'update'])->name('competition.update');
   
   // Payment Routes
   Route::get('/payment/update/{paymentId}', [AdminController::class, 'updatePayment'])->name('payment.update');
   Route::delete('/payment/delete/{paymentId}', [AdminController::class, 'destroyPayment'])->name('payment.delete');
});


Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
   Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/workshopAcademic', [WorkshopController::class, 'showAcademicWorkshop'])->name('workshop.academic');

Route::middleware('auth')->group(function () {
   Route::get('/workshop/{id}', [WorkshopController::class, 'show'])->name('workshop.show');
   Route::get('/payment/add/{workshop_id}', [PaymentController::class, 'add'])->name('payment.add');
   Route::post('/payment/store', [PaymentController::class, 'storePayment'])->name('payment.store');
   Route::post('/payment/status/{id}', [PaymentController::class, 'updateStatus'])->name('payment.status.update');
});

Route::middleware('auth')->group(function () {
   Route::get('/competition/{id}', [CompetitionController::class, 'show'])->name('competition.show');
   Route::get('/payment/add/{competition_id}', [PaymentController::class, 'add'])->name('payment.add');
   Route::post('/payment/store', [PaymentController::class, 'storePayment'])->name('payment.store');
   Route::post('/payment/status/{id}', [PaymentController::class, 'updateStatus'])->name('payment.status.update');
});

Route::get('/ForgotPassword', function () {
   return view('ForgotPassword');
})->name('forgot-password.form');

