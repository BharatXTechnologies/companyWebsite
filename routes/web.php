<?php

use App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Frontend\Home;
use Illuminate\Support\Facades\Route;

Route::get('/',[Home::class,'index'])->name('index');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/login', [Admin::class, 'AdminLogin'])->name('login')->middleware('isAdminLogout');
    Route::post('/loginProccess', [Admin::class, 'AdminLoginProccess'])->name('loginProccess')->middleware('isAdminLogout');
    Route::get('/logout', [Admin::class, 'logoutAdmin'])->name('logout');
    
    // admin dashboard
    Route::get('/dashboard', [Admin::class, 'adminDashboard'])->name('dashboard')->middleware('isAdminLogin');
    Route::get('/clients', [Admin::class, 'ClientsList'])->name('clients')->middleware('isAdminLogin');
    Route::get('/addClient', [Admin::class, 'addClient'])->name('addClient')->middleware('isAdminLogin');

});
