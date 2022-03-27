<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/','index');
Route::view('/','sign');
Route::name('user.')->group(function(){
    Route::view('/office','office')->middleware('auth')->name('office');
    
    Route::get('/sign', function(){
        if(Auth::check()){
            return redirect(route('user.office'));
        }
        return view('sign');
    })->name('sign');
    
    Route::post('/sign',[\App\Http\Controllers\SignController::class, 'sign']);



   Route::get('/logout',function(){
       Auth::logout();
       return redirect('/');
    })->name('logout');



   Route::get('signup',function(){
    if(Auth::check()){
        return redirect(route('user.office'));
    }
       return view('signup');
   })->name('signup');

       Route::post('/signup',[\App\Http\Controllers\SignUpController::class, 'save']);
});
