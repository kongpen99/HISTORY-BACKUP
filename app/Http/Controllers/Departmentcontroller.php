<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Departmentcontroller extends Controller
{
        public function index(){
        return view('admin.department.index');
        }

    // ทำการสร้าง Function store เพื่อทำการรับ Request หรือรับตำแหน่งงานที่ส่งมา
        public function store(Request $request){
            //ทำการ ดีบักข้อมูลที่ส่งมา
            dd($request->department_name);
        }
}
