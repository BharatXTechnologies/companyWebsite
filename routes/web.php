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
    Route::post('/storeClient', [Admin::class, 'storeClient'])->name('storeClient')->middleware('isAdminLogin');
    Route::get('/toggleStatus/{id}', [Admin::class, 'toggleClientStatus'])->name('toggleStatus')->middleware('isAdminLogin');
    Route::get('/deleteClient/{id}', [Admin::class, 'deleteClient'])->name('deleteClient')->middleware('isAdminLogin');
    Route::get('/editClient/{id}', [Admin::class, 'addClient'])->name('editClient')->middleware('isAdminLogin');
    Route::put('/updateClient/{id}', [Admin::class, 'storeClient'])->name('updateClient')->middleware('isAdminLogin');

    // Website setting
    Route::get('/mediaSetting', [Admin::class, 'mediaSetting'])->name('mediaSetting')->middleware('isAdminLogin');
    Route::post('/storeMediaSetting/{name}', [Admin::class, 'storeMediaSetting'])->name('storeMediaSetting')->middleware('isAdminLogin');

    // contact settings
    Route::get('/contactSetting', [Admin::class, 'contactSetting'])->name('contactSetting')->middleware('isAdminLogin');
    Route::post('/storeContactSetting', [Admin::class, 'storeContactSetting'])->name('storeContactSetting')->middleware('isAdminLogin');

    // social media settings
    Route::get('/socialMediaSetting', [Admin::class,'socialMediaSetting'])->name('socialMediaSetting')->middleware('isAdminLogin');
    Route::post('/storeSocialMediaSetting', [Admin::class,'storeSocialMediaSetting'])->name('storeSocialMediaSetting')->middleware('isAdminLogin');

    // profile settings
    Route::get('/profile', [Admin::class, 'profile'])->name('profile')->middleware('isAdminLogin');

});
