<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AppointmentController::class, 'index'])->name('home');
Route::post('/rendez-vous', [AppointmentController::class, 'store'])->name('appointment.store');

// Endpoints dédiés à la démonstration commerciale
Route::get('/api/demo/appointments', [AppointmentController::class, 'apiAppointments'])->name('demo.appointments');
Route::post('/api/demo/reset', [AppointmentController::class, 'resetDemo'])->name('demo.reset');
