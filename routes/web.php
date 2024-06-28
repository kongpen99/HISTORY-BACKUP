<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

//การสร้าง Route about โดยการใช้ Controllers 
Route::get('/about',[AboutController::class,'index'])->name('about');

//การสร้าง Route methods  โดยการใช้ Controllers 
Route::get('/member',[MemberController::class,'index'])->name('member');

//การสร้าง Route admin  โดยการใช้ Controllers 
Route::get('/admin',[AdminController::class,'index'])->name('admin');




// ใช้ Functions ในการส่งค่ากลับมาแสดงผล //
// Route::get('/member', function () {
//     return view('member.index');
// });


// ใช้ Functions ในการส่งค่ากลับมาแสดงผล //
// Route::get('/admin', function () {
//     return view('admin.index');
// });


