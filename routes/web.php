<?php

use App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Backend\Clients;
use App\Http\Controllers\Backend\Project;
use App\Http\Controllers\Backend\Technology;
use App\Http\Controllers\Backend\TrashedController;
use App\Http\Controllers\Frontend\Home;
use Illuminate\Support\Facades\Route;

Route::get('/',[Home::class,'index'])->name('index');

Route::prefix('admin')->name('admin.')->group(function(){

    // common routes
    Route::get('/{module}/trashed', [TrashedController::class, 'getTrashedData'])->name('trashed')->middleware('isAdminLogin');
    Route::get('/{module}/{id}/delete', [TrashedController::class, 'deleteRecord'])->name('deleteRecord')->middleware('isAdminLogin');
    Route::get('/{module}/restore-all', [TrashedController::class, 'restoreAll'])->name('restoreAll')->middleware('isAdminLogin');





    Route::get('/login', [Admin::class, 'AdminLogin'])->name('login')->middleware('isAdminLogout');
    Route::post('/loginProccess', [Admin::class, 'AdminLoginProccess'])->name('loginProccess')->middleware('isAdminLogout');
    Route::get('/logout', [Admin::class, 'logoutAdmin'])->name('logout');
    
    // admin dashboard
    Route::get('/dashboard', [Admin::class, 'adminDashboard'])->name('dashboard')->middleware('isAdminLogin');

    
    Route::get('/clients', [Clients::class, 'ClientsList'])->name('clients')->middleware('isAdminLogin');
    Route::get('/addClient', [Clients::class, 'addClient'])->name('addClient')->middleware('isAdminLogin');
    Route::post('/storeClient', [Clients::class, 'storeClient'])->name('storeClient')->middleware('isAdminLogin');
    Route::get('/toggleStatus/{id}', [Clients::class, 'toggleClientStatus'])->name('toggleStatus')->middleware('isAdminLogin');
    Route::get('/deleteClient/{id}', [Clients::class, 'deleteClient'])->name('deleteClient')->middleware('isAdminLogin');
    Route::get('/editClient/{id}', [Clients::class, 'addClient'])->name('editClient')->middleware('isAdminLogin');
    Route::put('/updateClient/{id}', [Clients::class, 'storeClient'])->name('updateClient')->middleware('isAdminLogin');

    // Website setting
    Route::get('/mediaSetting', [Admin::class, 'mediaSetting'])->name('mediaSetting')->middleware('isAdminLogin');
    Route::post('/storeMediaSetting/{name}', [Admin::class, 'storeMediaSetting'])->name('storeMediaSetting')->middleware('isAdminLogin');

    // contact settings
    Route::get('/contactSetting', [Admin::class, 'contactSetting'])->name('contactSetting')->middleware('isAdminLogin');
    Route::post('/storeContactSetting', [Admin::class, 'storeContactSetting'])->name('storeContactSetting')->middleware('isAdminLogin');


// technology
    Route::get('/technology', [Technology::class, 'index'])->name('technologies')->middleware('isAdminLogin');
    Route::get('/add-technology', [Technology::class, 'addTechnology'])->name('addTechnology')->middleware('isAdminLogin');
    Route::post('/store-technology', [Technology::class, 'storeTechnology'])->name('storeTechnology')->middleware('isAdminLogin');
    Route::get('/edit-technology/{id}', [Technology::class, 'addTechnology'])->name('editTechnology')->middleware('isAdminLogin'); //pending
    Route::get('/delete-technology/{id}', [Technology::class, 'deleteTechnology'])->name('deleteTechnology')->middleware('isAdminLogin');

    // projects settings
    Route::get('/projects', [Project::class, 'projectsList'])->name('projects')->middleware('isAdminLogin');
    Route::get('/addProject', [Project::class, 'addProject'])->name('addProject')->middleware('isAdminLogin');
    // Route::post('/storeProject', [Project::class,'storeProject'])->name('storeProject')->middleware('isAdminLogin');
    // Route::get('/toggleProjectStatus/{id}', [Project::class, 'toggleProjectStatus'])->name('toggleProjectStatus')->middleware('isAdminLogin');
    // Route::get('/deleteProject/{id}', [Project::class, 'deleteProject'])->name('deleteProject')->middleware('isAdminLogin');
    // Route::get('/editProject/{id}', [Project::class, 'addProject'])->name('editProject')->middleware('isAdminLogin');

    // social media settings
    Route::get('/socialMediaSetting', [Admin::class,'socialMediaSetting'])->name('socialMediaSetting')->middleware('isAdminLogin');
    Route::post('/storeSocialMediaSetting', [Admin::class,'storeSocialMediaSetting'])->name('storeSocialMediaSetting')->middleware('isAdminLogin');

    // profile settings
    Route::get('/profile', [Admin::class, 'profile'])->name('profile')->middleware('isAdminLogin');

});
