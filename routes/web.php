<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RedirectController;


Route::get('/welcome', function () {
    return view('layouts.welcome');
});

// Authentication routes
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/proses_register', [AuthController::class, 'proses_register'])->name('proses_register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Routes accessible to authenticated users
Route::middleware(['auth'])->group(function () {

    // RT-specific routes
    Route::middleware(['role_id:1'])->group(function () {
        // Admin-specific routes
        Route::get('dashboardAdmin', [DashboardController::class, 'indexAdmin'])->name('dashboardAdmin');
        Route::get('/get-chart-data-rt', [DashboardController::class, 'getChartDataRT']);

        // Admin-specific reservation management routes

        // Admin-specific reservation management routes
        Route::resource('admin/reservations', ReservationController::class); // CRUD for reservations
        Route::get('admin/reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve'); // Admin approv    es a reservation
        Route::get('admin/reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject'); // Admin rejects a reservation
    });

    Route::middleware(['role_id:2'])->group(function () {
        // Approval-specific routes
        Route::get('dashboardApproval', [DashboardController::class, 'indexApproval'])->name('dashboardApproval');
        Route::get('/get-chart-data-rw', [DashboardController::class, 'getChartDataRW']);

        // Approval-specific reservation approval routes
        Route::get('reservations/{reservation}/approve', [ReservationController::class, 'approve'])->name('reservations.approve'); // Approval approves a reservation
        Route::get('reservations/{reservation}/reject', [ReservationController::class, 'reject'])->name('reservations.reject'); // Approval rejects a reservation
    });

    // Superadmin and employee specific routes
    Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/redirect', [RedirectController::class, 'cek']);
    });
});

Route::prefix('vehicles')->group(function () {
    Route::get('/', [VehicleController::class, 'index']);  // Menampilkan semua kendaraan
    Route::get('{id}', [VehicleController::class, 'show']); // Menampilkan kendaraan berdasarkan ID
    Route::post('/', [VehicleController::class, 'store']); // Menambahkan kendaraan baru
    Route::put('{id}', [VehicleController::class, 'update']); // Memperbarui kendaraan
    Route::delete('{id}', [VehicleController::class, 'destroy']); // Menghapus kendaraan
});

// Saran Dan Pengaduan routes for RT and RW
