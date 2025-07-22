<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        return redirect("/$role/dashboard");
    });
    Route::get('/admin/dashboard', fn() => view('dashboard.admin'));
    Route::get('/guru/dashboard', fn() => view('dashboard.guru'));
    Route::get('/siswa/dashboard', fn() => view('dashboard.siswa'));
});

require __DIR__.'/auth.php';
