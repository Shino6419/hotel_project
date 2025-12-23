<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', [AdminController::class, 'home']);

route::get('/home', [AdminController::class, 'index'])->name('home');

route::get('/view_room', [AdminController::class, 'view_room'])->name('view_room');
;

route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);

route::get('/booking_delete/{id}', [AdminController::class, 'booking_delete']);

route::get('/room_update/{id}', [AdminController::class, 'room_update']);

route::get('/room_details/{id}', [HomeController::class, 'room_details']);

route::get('/create_room', [AdminController::class, 'create_room']);

route::post('/add_room', [AdminController::class, 'add_room']);

route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);

route::post('/add_booking/{id}', [HomeController::class, 'add_booking'])->middleware('auth');

route::get('/booking_history', [HomeController::class, 'booking_history'])->middleware('auth')->name('booking_history');

route::get('/edit_booking/{id}', [HomeController::class, 'edit_booking'])->middleware('auth');

route::post('/update_booking/{id}', [HomeController::class, 'update_booking'])->middleware('auth');

route::delete('/cancel_booking/{id}', [HomeController::class, 'cancel_booking'])->middleware('auth');

route::get('/booking', [AdminController::class, 'booking']);

route::get('/approve_book/{id}', [AdminController::class, 'approve_book']);

route::get('/reject_book/{id}', [AdminController::class, 'reject_book']);

route::get('/view_gallary', [AdminController::class, 'view_gallary']);


route::post('/upload_gallary', [AdminController::class, 'upload_gallary']);

route::get('/delete_gallary/{id}', [AdminController::class, 'delete_gallary']);


route::post('/contact', [HomeController::class, 'contact']);


route::get('/view_contact', [AdminController::class, 'view_contact']);


route::get('/delete_contact/{id}', [AdminController::class, 'delete_contact']);


route::get('/view_gallary', [AdminController::class, 'view_gallary']);


route::get('/index_gallary', [HomeController::class, 'index_gallary']);


route::get('/index_room', [HomeController::class, 'index_room']);



