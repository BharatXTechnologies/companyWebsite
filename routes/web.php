<?php

use App\Http\Controllers\Frontend\Home;
use Illuminate\Support\Facades\Route;

Route::get('/',[Home::class,'index'])->name('index');

Route::prefix('admin')->name('admin.')->group(function(){
    
});
