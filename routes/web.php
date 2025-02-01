<?php

// backend configuration

use App\Http\Controllers\Backend\serviceController;
use App\Http\Controllers\Backend\Admin;
use App\Http\Controllers\Backend\categoryController;
use App\Http\Controllers\Backend\Clients;
use App\Http\Controllers\Backend\featureController;
use App\Http\Controllers\Backend\Project;
use App\Http\Controllers\Backend\Technology;
use App\Http\Controllers\Backend\TrashedController;

// frontend configuration
use App\Http\Controllers\Frontend\Home;

// routes
use Illuminate\Support\Facades\Route;

Route::get('/',[Home::class,'index'])->name('index');





// backend
Route::prefix('admin')->name('admin.')->group(function(){

    // common routes
    Route::get('/{module}/trashed', [TrashedController::class, 'getTrashedData'])->name('trashed')->middleware('isAdminLogin');
    Route::get('/{module}/{id}/delete', [TrashedController::class, 'permanentDelete'])->name('deleteRecord')->middleware('isAdminLogin');
    Route::get('/{module}/restore-all', [TrashedController::class, 'restoreAll'])->name('restoreAll')->middleware('isAdminLogin');





    Route::get('/login', [Admin::class, 'AdminLogin'])->name('login')->middleware('isAdminLogout');
    Route::post('/login-Proccess', [Admin::class, 'AdminLoginProccess'])->name('loginProccess')->middleware('isAdminLogout');
    Route::get('/logout', [Admin::class, 'logoutAdmin'])->name('logout');
    
    // admin dashboard
    Route::get('/dashboard', [Admin::class, 'adminDashboard'])->name('dashboard')->middleware('isAdminLogin');

    
    Route::get('/clients', [Clients::class, 'ClientsList'])->name('clients')->middleware('isAdminLogin');
    Route::get('/add-client', [Clients::class, 'addClient'])->name('addClient')->middleware('isAdminLogin');
    Route::post('/store-client', [Clients::class, 'storeClient'])->name('storeClient')->middleware('isAdminLogin');
    Route::get('/toggle-status/{id}', [Clients::class, 'toggleClientStatus'])->name('toggleStatus')->middleware('isAdminLogin');
    Route::get('/delete-client/{id}', [Clients::class, 'deleteClient'])->name('deleteClient')->middleware('isAdminLogin');
    Route::get('/edit-client/{id}', [Clients::class, 'addClient'])->name('editClient')->middleware('isAdminLogin');
    Route::put('/update-client/{id}', [Clients::class, 'storeClient'])->name('updateClient')->middleware('isAdminLogin');

    // features
    Route::get('/features', [featureController::class, 'Features'])->name('features')->middleware('isAdminLogin');
    Route::post('/store-feature', [featureController::class, 'storeFeature'])->name('storeFeature')->middleware('isAdminLogin');
    Route::get('/edit-feature/{id}', [featureController::class, 'editFeature'])->name('editFeature')->middleware('isAdminLogin');
    Route::post('/import-features', [featureController::class, 'importFeatures'])->name('importFeatures')->middleware('isAdminLogin');
    Route::get('/delete-feature/{id}', [featureController::class, 'deleteFeature'])->name('deleteFeature')->middleware('isAdminLogin');

    // services
    Route::get('/services', [serviceController::class, 'services'])->name('services')->middleware('isAdminLogin');
    Route::get('/add-service', [serviceController::class, 'addService'])->name('addService')->middleware('isAdminLogin');

    // Website setting
    Route::get('/mediaSetting', [Admin::class, 'mediaSetting'])->name('mediaSetting')->middleware('isAdminLogin');
    Route::post('/storeMediaSetting/{name}', [Admin::class, 'storeMediaSetting'])->name('storeMediaSetting')->middleware('isAdminLogin');

    // contact settings
    Route::get('/contactSetting', [Admin::class, 'contactSetting'])->name('contactSetting')->middleware('isAdminLogin');
    Route::post('/storeContactSetting', [Admin::class, 'storeContactSetting'])->name('storeContactSetting')->middleware('isAdminLogin');

    // category
    Route::get('/category', [categoryController::class, 'index'])->name('category')->middleware('isAdminLogin');
    Route::post('/store-category', [categoryController::class, 'storeCategory'])->name('storeCategory')->middleware('isAdminLogin');
    Route::get('/delete-category/{id}', [categoryController::class, 'deleteCategory'])->name('deleteCategory')->middleware('isAdminLogin');

    // technology
    Route::get('/technology', [Technology::class, 'index'])->name('technologies')->middleware('isAdminLogin');
    Route::get('/add-technology', [Technology::class, 'addTechnology'])->name('addTechnology')->middleware('isAdminLogin');
    Route::post('/store-technology', [Technology::class, 'storeTechnology'])->name('storeTechnology')->middleware('isAdminLogin');
    Route::get('/toggle-technology-status/{id}', [Technology::class, 'toggleTechnologyStatus'])->name('toggleTechnologyStatus')->middleware('isAdminLogin');
    Route::get('/edit-technology/{id}', [Technology::class, 'addTechnology'])->name('editTechnology')->middleware('isAdminLogin');
    Route::post('/update-technology/{id}', [Technology::class, 'storeTechnology'])->name('updateTechnology')->middleware('isAdminLogin');
    Route::get('/delete-technology/{id}', [Technology::class, 'deleteTechnology'])->name('deleteTechnology')->middleware('isAdminLogin');

    // projects settings
    Route::get('/projects', [Project::class, 'projectsList'])->name('projects')->middleware('isAdminLogin');
    Route::get('/add-Project', [Project::class, 'addProject'])->name('addProject')->middleware('isAdminLogin');
    Route::post('/store-Project', [Project::class,'storeProject'])->name('storeProject')->middleware('isAdminLogin');
    Route::get('/edit-project/{id}', [Project::class, 'addProject'])->name('editProject')->middleware('isAdminLogin');
    Route::put('/update-project/{id}', [Project::class, 'storeProject'])->name('updateProject')->middleware('isAdminLogin');
    Route::get('/delete-project/{id}', [Project::class, 'deleteProject'])->name('deleteProject')->middleware('isAdminLogin');
    Route::get('/toggle-projectStatus/{id}', [Project::class, 'toggleProjectStatus'])->name('toggleProjectStatus')->middleware('isAdminLogin');

    // social media settings
    Route::get('/socialMediaSetting', [Admin::class,'socialMediaSetting'])->name('socialMediaSetting')->middleware('isAdminLogin');
    Route::post('/storeSocialMediaSetting', [Admin::class,'storeSocialMediaSetting'])->name('storeSocialMediaSetting')->middleware('isAdminLogin');

    // profile settings
    Route::get('/profile', [Admin::class, 'profile'])->name('profile')->middleware('isAdminLogin');

});
