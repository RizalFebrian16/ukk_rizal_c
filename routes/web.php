<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\TransactionController; 

/*
HOME
*/

Route::get('/', function () {
    return view('welcome');
});

/*
DASHBOARD REDIRECT SESUAI ROLE
*/

Route::get('/dashboard', function () {

    $role = auth()->user()->role;

    if ($role == 'admin') {
        return redirect('/admin');
    }

    if ($role == 'petugas') {
        return redirect('/petugas');
    }

    if ($role == 'siswa') {
        return redirect('/siswa');
    }

    abort(403);

})->middleware('auth');

/*
LOGIN
*/

Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);

/*
REGISTER
*/

Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);

/*
LOGOUT
*/

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
DASHBOARD PER ROLE
*/

/*
DASHBOARD ADMIN
*/

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin']);

/*
DASHBOARD PETUGAS
*/

Route::get('/petugas', function () {
    return view('petugas.dashboard');
})->middleware(['auth', 'role:petugas']);

/*
DASHBOARD SISWA
*/

Route::get('/siswa', function () {
    return view('siswa.dashboard');
})->middleware(['auth', 'role:siswa']);

Route::middleware(['auth','role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::resource('books', BookController::class);

    });

    Route::middleware(['auth','role:siswa'])
    ->prefix('siswa')
    ->group(function () {

        Route::get(
            '/transactions',
            [TransactionController::class, 'indexSiswa']
        );

        Route::post(
            '/transactions',
            [TransactionController::class, 'store']
        )->name('siswa.transactions.store');

    });

    Route::middleware(['auth','role:petugas'])
    ->prefix('petugas')
    ->group(function () {

        Route::get(
            '/transactions',
            [TransactionController::class, 'indexPetugas']
        );

        Route::post(
            '/transactions/{id}/acc',
            [TransactionController::class, 'acc']
        )->name('petugas.transactions.acc');

    });

    Route::middleware(['auth','role:siswa'])
    ->prefix('siswa')
    ->group(function () {

        Route::get('/books', [BookController::class, 'indexSiswa'])
            ->name('siswa.books');

    });

    Route::post('/siswa/transactions/{id}/return', [TransactionController::class, 'return'])
    ->name('siswa.transactions.return');