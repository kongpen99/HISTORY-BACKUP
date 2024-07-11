<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Departmentcontroller;

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



//Route สำหรับ Link ไปยังหน้า Web-Board
Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function () {
    $users=DB::table('users')->get();
    return view('dashboard',compact('users'));
})->name('dashboard');


//Route ไปหน้า Department //
Route::get('/department/all',[Departmentcontroller::class,'index'])->name('department');

//กำหนด Action กดปุ่มบันทึกหรือ Submit เพื่อให้เกิด Action ใน Form ว่าจะให้ทำงานในส่วนไหน หรือ เกิด Action ในส่วนไหนโดย ระบบุ Action ผ่านตัว Route
Route::post('/department/add',[Departmentcontroller::class,'store'])->name('addDepartment');








///ใช้ในการ อ้างอิงเส้นทาง Route#####

//การสร้าง Route about โดยการใช้ Controllers 
//Route::get('/about',[AboutController::class,'index'])->name('about')->middleware('check');

//การสร้าง Route methods  โดยการใช้ Controllers 
//Route::get('/member',[MemberController::class,'index'])->name('member');

//การสร้าง Route admin  โดยการใช้ Controllers 
//Route::get('/admin',[AdminController::class,'index'])->name('admin')->middleware('check');

// ใช้ Functions ในการส่งค่ากลับมาแสดงผล //
// Route::get('/member', function () {
//     return view('member.index');
// });


// ใช้ Functions ในการส่งค่ากลับมาแสดงผล //
// Route::get('/admin', function () {
//     return view('admin.index');
// });


