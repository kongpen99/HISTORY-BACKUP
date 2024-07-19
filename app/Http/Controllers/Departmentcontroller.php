<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
    //ทำการ add เพิ่ม Model เข้ามาทำงาน//
use App\Models\Department;
    //เพิ่ม use Illuminate\Support\Facades\Auth; เพื่อทำการเข้าถึงรหัสผู้ใช้งาน หรือคนที่ทำการ Login
use Illuminate\Support\Facades\Auth;
    //ทำการ Import add เพิ่ม DB เข้ามาทำงาน//
use Illuminate\Support\Facades\DB;
// use App\Models\Department as ModelsDepartment;
class Departmentcontroller extends Controller
{
        public function index(){
            //กำหนดโดยใช้รูปแบบ Query Builder
            //โดยกำหนดตัวแปร $departments แล้วอ้างอิงไปที่ตัว DB:: แล้วตามด้วยตาราง ('departments')แล้วก็ให้ไปใช้ตัวฟังก์ชั่น หรือ Method ->paginate(5);  ตามด้วยจำนวนรายการที่เราต้องการให้แสดงผลในแต่ละหน้า ตัวอย่างให้แสดง 5 รายการต่อ 1 หน้า
             $departments = DB::table('departments')->paginate(5);
            //โดยใช้ compact และก็ชื่อตัว แปร departments  ที่บรรทัด==> return view('admin.department.index',compact('departments')); 
             return view('admin.department.index',compact('departments'));
     }
    //... ทำการสร้าง Function store เพื่อทำการรับ Request หรือรับตำแหน่งงานที่ส่งมา...//
        public function store(Request $request){
            //ตรวจสอบข้อมูล
            //ทำการ ดีบักข้อมูลที่ส่งมาแสดงผล
            // dd($request->department_name); --ใช้ในการตรวจสอบการป้อนข้อมูลแสดงค่าที่ป้อนออกมาแสดง
                //ใช้ในกำหนดเงื่อนไขในการรับค่าที่ ป้อนเข้ามาใน Department_name//
            $request->validate(
            [
                'department_name'=>'required|unique:departments|max:255'
            ],
                //กรณีป้อนเป็นค่าว่างให้ทำการแจ้งเตือนข้อความ
            [
            'department_name.required'=>"กรุณาป้อนชื่อชื่อแผนกด้วยครับ",
                //กรณีป้อนข้อความเกินที่กำหนดให้ทำการแจ้งเตือนข้อความ
            'department_name.max'=>"ห้ามป้อนเกิน 255 ตัวอักษร",
            'department_name.unique'=>"มีข้อมูลชื่อแผนกนี้ในฐานข้อมูลแล้ว",
            ]
        );
            //--บันทึกข้อมูล ///
                    //ทำการจัดเตรียมกลุ่มข้อมูลเอาไว้---///
                // บันทึกข้อมูลลงในตาราง Department ==> เป็นแแบบ Query Builder ซึ่งจะต้องทำการเตรียมข้อมูลก้อน หนึ่งเอาไว้ก่อนเป็นรูปแบบ Arry
            //1.ทำการสร้างข้อมูล Arry ขึ้นมาชื่อ data สร้างโดยใช้งาน Function Arry เปล่าๆขึ้นมา 
            $data =array();
            //--**โดย Arry ที่สร้างขึ้นมาเป็นแบบ Associ arry คือจับคู่ key กับ Values หากพบค่าที่ตรงกัน ฟังก์ชันจะส่งกลับอาร์เรย์ย่อยที่ตรงกันนั้น แต่ถ้าไม่พบค่าที่ตรงกัน ฟังก์ชันจะส่งกลับค่า nil ****//
            //2. โดย Key ตัวแรกจะอ้างอิงชื่อตาม Colums ก็จะเป็น ["dapartment_name"]มีค่าเท่ากับ $request ที่ส่งมาตามด้วยชื่อ -> requestที่ส่งมาคือ department_name
            $data["department_name"] = $request->department_name;
            //3.ใช้ User_id มีค่าเท่ากับ Auth::User หรือฟังก์ชั้น User เป็นรูปแบบของ Static ตามด้วย ID หรัสผู้ใช้
            $data['user_id'] =Auth::User()->id;
                //-- รูปแบบ Query Builder ---//
            //4. นำ DB มาอ้างอิงว่าจะทำงานกับตารางอะไร คือ DB::ตารางTable ชื่อตาราง dapartment ใช้งานฟังก์ชั้น Insert แล้วโยนข้อมูล dataเข้าไป
            DB::table('departments')->insert($data);
           //ให้กลับมาในแบบฟอร์มบันทึกข้อมูลเหมือนเดิม พร้อมส่งค่า แสดงข้อมูลว่าทำการ บันทึกเรียบร้อยแล้ว
            Return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
    }
}
            //     // บันทึกข้อมูลลงในตาราง Department // เป็นแแบบ Eloquent ORM
            //     // ข้อมูลที่เราจะบันทึกลงไปใน ฟิวล์ department_name
            // $department = new Department;
            //     //เก็บลงใน $department ฟิวลฺ์ department_name = /รับค่ามาจาก $request->department_name แล้วเก็บใน $department->department_name  ที่อยู่ด้านหน้า
            // $department->department_name = $request->department_name;
            //     //ทำการกำหนด่าลงไป Authและเรียกใช้งาน Static :: Mathod user ฟิวล์ id
            // $department->user_id = Auth::user()->id;
            //     //ทำการบันทึกข้อมูลโดยใช้  $department->save();
            // $department->save();
            // //ให้กลับมาในแบบฟอร์มบันทึกข้อมูลเหมือนเดิม พร้อมส่งค่า แสดงข้อมูลว่าทำการ บันทึกเรียบร้อยแล้ว
            // Return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");
//         }
// }