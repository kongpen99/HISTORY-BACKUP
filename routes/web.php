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
         //กำหนดสิทธิ์เข้าถึงข้อมูลด้วย ถ้าอยากจะเข้าไปเพิ่มข้อมูลดูข้อมูล จะต้องทำการ Login ก่อนเขียน Code ดักเอาไว้ โดยใช้ Route::middleware(['auth:sanctum','verified']) โดยระบุเป็นกลุ่ม ->Group ของ Routที่อยู่ด้านในฟังก์ชั่น 
         //โดยการเอา Rount แบบ Route::get และ Route::post เอาไปอยู่ด้านใน เพื่อเป็นการบอกว่าถ้าคุณต้องการเข้าถึงตัว department ในการสอบถามข้อมูล การบันทึกข้อมูล คุณจะต้องทำการ Login ก่อน
         Route::middleware(['auth:sanctum','verified'])->group(function(){
        //Route ไปหน้า Department //
        Route::get('/department/all',[Departmentcontroller::class,'index'])->name('department');

        //กำหนด Action กดปุ่มบันทึกหรือ Submit เพื่อให้เกิด Action ใน Form ว่าจะให้ทำงานในส่วนไหน หรือ เกิด Action ในส่วนไหนโดย ระบบุ Action ผ่านตัว Route
        Route::post('/department/add',[Departmentcontroller::class,'store'])->name('addDepartment'); 
        
        //ทำสร้าง Route กำหนด สำหรับปุ่มแก้ไขข้อมูล Edit
        Route::get('/department/edit/{id}',[Departmentcontroller::class,'edit']);

         //ทำสร้าง Route กำหนด สำหรับปุ่มอัพเดตข้อมูล  Update
         //ใช้ Method post (วิธี โพสต์ post) คือส่งข้อมูลจากแบบฟอร์มไปที่ตัว Controller และ ฟังก์ชั้น
         //รูปแบบการส่ง ระบบเป็น department/update/id ตัว controller คือตัว Departmentcontroller ฟังก์ชั่น update  
         
        Route::post('/department/update/{id}',[Departmentcontroller::class,'update']);

        //ทำสร้าง Route กำหนด สำหรับปุ่มลบข้อมูล Delete
        Route::get('/department/softdelete/{id}',[Departmentcontroller::class,'softdelete']);
        
    });
