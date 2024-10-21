<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RequestRoomController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\RequestInventoryController;



Route::group(['domain' => ''], function() {
    // AUTHENTIKASI
    Route::get('/',[AuthController::class, 'index'])->name('auth.index');
    Route::post('login',[AuthController::class, 'do_login'])->name('auth.login');
    Route::post('register',[AuthController::class, 'do_register'])->name('auth.register');

    Route::middleware('auth')->group(function(){
        Route::get('class', function(){
            return view('pages.layanan.class');
        })->name('class');
    
        Route::get('toefl', function () {
            return view('pages.layanan.toefl');
        })->name('toefl');
        
        Route::get('translate', function () {
            return view('pages.layanan.translate');
        })->name('translate');
    
        Route::get('background', function () {
            return view('pages.home.background');
        })->name('background');
    
        Route::get('staff', function () {
            return view('pages.home.staff');
        })->name('staff');
    
        // INVENTORIES
        Route::get('inventories', [InventoryController::class, 'index'])->name('inventories.index');
    
        // GALLERIES
        Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index');
    
        // DASHBOARD
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // REQUEST ROOM
        Route::get('request-rooms', [RequestRoomController::class, 'index'])->name('request-rooms.index');

        // REQUEST INVENTORY
        Route::get('request-inventories', [RequestInventoryController::class, 'index'])->name('request-inventories.index');

        // CONVERSATION
        Route::get('conversations', [ConversationController::class, 'index'])->name('conversations.index');
        Route::post('conversations/store', [ConversationController::class, 'store'])->name('conversations.store');
        Route::post('conversations/{conversation}/reply', [ConversationController::class, 'reply'])->name('conversations.reply');
        Route::get('conversations/{conversation}/edit', [ConversationController::class, 'edit'])->name('conversations.edit');
        Route::patch('conversations/{conversation}', [ConversationController::class, 'update'])->name('conversations.update');
        Route::delete('conversations/{conversation}', [ConversationController::class, 'destroy'])->name('conversations.destroy');

        Route::get('logout',[AuthController::class, 'do_logout'])->name('logout');
    });
    
    Route::middleware('Admin')->group(function(){
        // ANNOUNCEMENTS
        Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
        Route::post('announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
        Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
        Route::patch('announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
        Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

        // INVENTORIES
        Route::get('inventories/create', [InventoryController::class, 'create'])->name('inventories.create');
        Route::post('inventories', [InventoryController::class, 'store'])->name('inventories.store');
        Route::get('inventories/{inventory}/edit', [InventoryController::class, 'edit'])->name('inventories.edit');
        Route::patch('inventories/{inventory}', [InventoryController::class, 'update'])->name('inventories.update');
        Route::delete('inventories/{inventory}', [InventoryController::class, 'destroy'])->name('inventories.destroy');
        
        // GALLERIES
        Route::get('galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
        Route::post('galleries', [GalleryController::class, 'store'])->name('galleries.store');
        Route::get('galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
        Route::patch('galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
        Route::delete('galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

        // USERS
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('users/{user}/update', [UserController::class, 'update'])->name('users.update');

        // REQUEST INVENTORY
        Route::get('request-inventories/{request_inventory}/edit', [RequestInventoryController::class, 'edit'])->name('request-inventories.edit');
        Route::patch('request-inventories/{request_inventory}/verification', [RequestInventoryController::class, 'verification'])->name('request-inventories.verification');

        // REQUEST ROOMS
        Route::get('request-rooms/{request_room}/edit', [RequestRoomController::class, 'edit'])->name('request-rooms.edit');
        Route::patch('request-rooms/{request_room}/verification', [RequestRoomController::class, 'verification'])->name('request-rooms.verification');
    });

    Route::middleware('Mahasiswa')->group(function(){
        // REQUEST INVENTORY
        Route::get('request-inventories/create', [RequestInventoryController::class, 'create'])->name('request-inventories.create');
        Route::post('request-inventories', [RequestInventoryController::class, 'store'])->name('request-inventories.store');
        Route::get('request-inventories/{request_inventory}/edit', [RequestInventoryController::class, 'edit'])->name('request-inventories.edit');
        Route::patch('request-inventories/{request_inventory}', [RequestInventoryController::class, 'update'])->name('request-inventories.update');
        Route::delete('request-inventories/{request_inventory}', [RequestInventoryController::class, 'destroy'])->name('request-inventories.destroy');

        // REQUEST ROOMS
        Route::get('request-rooms/create', [RequestRoomController::class, 'create'])->name('request-rooms.create');
        Route::post('request-rooms', [RequestRoomController::class, 'store'])->name('request-rooms.store');
        Route::get('request-rooms/{request_room}/edit', [RequestRoomController::class, 'edit'])->name('request-rooms.edit');
        Route::patch('request-rooms/{request_room}', [RequestRoomController::class, 'update'])->name('request-rooms.update');
        Route::delete('request-rooms/{request_room}', [RequestRoomController::class, 'destroy'])->name('request-rooms.destroy');
    });

   // REQUEST INVENTORY
   Route::get('request-inventories/create', [RequestInventoryController::class, 'create'])->name('request-inventories.create');
   Route::post('request-inventories', [RequestInventoryController::class, 'store'])->name('request-inventories.store');
   Route::get('request-inventories/{request_inventory}/edit', [RequestInventoryController::class, 'edit'])->name('request-inventories.edit');
   Route::patch('request-inventories/{request_inventory}', [RequestInventoryController::class, 'update'])->name('request-inventories.update');
   Route::delete('request-inventories/{request_inventory}', [RequestInventoryController::class, 'destroy'])->name('request-inventories.destroy');

   // REQUEST ROOMS
   Route::get('request-rooms/create', [RequestRoomController::class, 'create'])->name('request-rooms.create');
   Route::post('request-rooms', [RequestRoomController::class, 'store'])->name('request-rooms.store');
   Route::get('request-rooms/{request_room}/edit', [RequestRoomController::class, 'edit'])->name('request-rooms.edit');
   Route::patch('request-rooms/{request_room}', [RequestRoomController::class, 'update'])->name('request-rooms.update');
   Route::delete('request-rooms/{request_room}', [RequestRoomController::class, 'destroy'])->name('request-rooms.destroy');
});