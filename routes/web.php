<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    $users = [];

    // Only fetch users if admin
    if (Auth::user()->is_admin) {
        $users = \App\Models\User::all();
    }

    return view('dashboard', ['users' => $users]);
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/password/edit', [PasswordController::class, 'edit'])
        ->name('password.edit');
    Route::put('/password/update', [PasswordController::class, 'update'])
        ->name('password.update');
});

require __DIR__.'/auth.php';
