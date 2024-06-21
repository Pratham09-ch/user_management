<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\frontend\PasswordResetController;
use App\Http\Controllers\frontend\UserController;
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

Route::get('/', function () {
    return view('frontend/login');
})->name('login');

Route::get('/register',function(){
    return view('frontend.register');
});

Route::post('/login',[UserController::class,'login'])->name('login.submit');
Route::post('/register/user',[UserController::class,'register'])->name('register.user');
Route::get('/logout',[UserController::class,'logout'])->name('logout');

// Route::middleware(['auth','auth.user:user'])->group(function (){
Route::group(['middleware'=>['web','auth.user']], function(){

    Route::get('/profile',[UserController::class,'show_profile'])->name('user.show_profile');
    Route::get('/profile/edit/{id}',[UserController::class,'edit_profile'])->name('user.edit_profile');
    Route::post('/profile/update',[UserController::class,'update_profile'])->name('user.update_profile');
});

// admin login

Route::get('/admin', function(){
    return view('backend.login');
})->name('admin.login');

// Route::get('/admin/register',function(){
//     return view('backend.register');    
// })->name('admin.register');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login.submit');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

Route::group(['prefix' => 'admin','middleware'=>['web','auth.admin']], function(){
    Route::get('/profile',[AdminController::class,'show_profile'])->name('admin.show_profile');
    Route::get('/users',[UserController::class,'index'])->name('admin.users');
    Route::get('/create',[UserController::class,'create'])->name('admin.create.user');
    Route::post('/store',[UserController::class,'store'])->name('admin.store.user');
    Route::get('/edit/{id}',[UserController::class,'edit'])->name('admin.edit.user');
    Route::post('/update',[UserController::class,'update'])->name('admin.update.user');
    Route::get('/delete/{id}',[UserController::class,'delete'])->name('admin.delete.user');
});


// password reset routes-------------------------------------------------

// Show form to request password reset link
Route::get('password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('password.request');
// Send password reset link
Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
// Show form to reset password
Route::get('password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('password.reset');
// Reset the password
Route::post('password/reset', [PasswordResetController::class, 'reset'])->name('password.update');



// testing email sending
Route::get('/test-email', function() {
    \Mail::raw('This is a test email.', function($message) {
        $message->to('prathameshchavan76072@gmail.com')
                ->subject('Test Email');
    });
    return 'Test email sent!';
});
