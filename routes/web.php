<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/room/Detail/{id}', [HomeController::class, 'roomDetail'])->name('roomDetail');
Route::get('/about/page', [HomeController::class, 'aboutPage'])->name('aboutPage');
Route::post('/add/booking/{id}', [HomeController::class, 'addBooking'])->name('addBooking');
Route::post('/store/contact', [HomeController::class, 'storeContact'])->name('storeContact');
Route::get('/our-rooms', [HomeController::class, 'ourRooms'])->name('ourRooms');
Route::get('/our-gallaries', [HomeController::class, 'ourGallaries'])->name('ourGallaries');
Route::get('/our-contacts', [HomeController::class, 'ourContacts'])->name('ourContacts');

Route::group(['prefix' => 'account'], function () {

    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('processRegister', [LoginController::class, 'processRegister'])->name('account.processRegister');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('account.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::get('/create/rooms', [RoomController::class, 'createRoom'])->name('admin.createRoom');
        Route::post('/store/rooms', [RoomController::class, 'storeRoom'])->name('admin.storeRoom');
        Route::get("/view/rooms", [RoomController::class, 'viewRoom'])->name('admin.viewRoom');
        Route::get("/edit/rooms/{id}", [RoomController::class, 'editRoom'])->name('admin.editRoom');
        Route::post("/update/rooms/{id}", [RoomController::class, 'updateRoom'])->name('admin.updateRoom');
        Route::delete("/delete/rooms", [RoomController::class, 'deleteRoom'])->name('admin.deleteRoom');

        Route::get('/bookings', [RoomController::class, 'bookings'])->name('admin.bookings');
        Route::get("/approve/bookings/{id}", [RoomController::class, 'approveBooking'])->name('admin.approveBooking');
        Route::get("/reject/bookings/{id}", [RoomController::class, 'rejectBooking'])->name('admin.rejectBooking');
        Route::delete("/delete/bookings", [RoomController::class, 'deleteBooking'])->name('admin.deleteBooking');

        Route::get('/gallary',[RoomController::class, 'gallary'])->name('admin.gallary');
        Route::post('/gallary/store',[RoomController::class, 'gallaryStore'])->name('admin.gallaryStore');
        Route::get('/delete/gallary/{id}',[RoomController::class, 'destroyGallery'])->name('admin.destroyGallery');

        Route::get('/messages',[RoomController::class, 'messages'])->name('admin.messages');
        Route::get('/send/mail/{id}',[RoomController::class, 'sendMail'])->name('admin.sendMail');
        Route::post('/mail/{id}',[RoomController::class, 'mail'])->name('admin.mail');
    });
});
