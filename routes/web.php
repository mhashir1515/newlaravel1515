<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = [];

    if (Auth::user()->is_admin) {
        $users = User::all();
    }

    return view('dashboard', ['users' => $users]);
})->middleware(['auth'])->name('dashboard');

Route::get('/debug-error', function () {
    throw new \Exception('Test error to trigger Laravel error logging');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');
});

require __DIR__.'/auth.php';
