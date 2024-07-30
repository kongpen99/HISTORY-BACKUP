<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี ,{{Auth::user()->name}}
        </h2>
    </x-slot>
    
    {{-- ทำการสร้างตารางแก้ไขข้อมูลแผกนก --}}
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        {{-- สร้างชุดตารางรับการกรอก ข้อมูลเข้ามา และเมื่อการกดปุ่มบันทึกจะทำให้เกิด action โดยให้ไปเรียกใช้งาน Route ที่มีชื่อว่า addDepartment--}}
                        <div class="card-body">
                            <form action="" method="post">
                                {{-- @csrf เพื่อป้องกันการ แฮกระบบป้อนข้อมูลในแบบฟอร์มแบบสคิปข้อมูลเข้ามา --}}
                                @csrf  
                                <div class="form-group">
                                    <label for="department_name">ชื่อแผนก</label>
                                    {{-- รับค่า text ที่กรอกเข้ามาใน ชื่อตำแหน่งงาน  --}}
                                    {{-- ให้ทำการรับค่าแล้วแสดงผลในแบบ Form edit (แบบฟอร์มแก้ไข) โดยทำการระบบ value ลงไป  ตามด้วยชื่อแผนก ตาราง $department ตามด้วยชื่อ คอลัมล์ department_name --}}
                                    <input type="text" class="form-control" name="department_name" value="{{$department->department_name}}">
                                </div>
                                @error('department_name')
                                    <div class="my-2">
                                        <span class="text-danger">{{$message}}</span>
                                    </div>
                                @enderror
                                {{-- (););สร้างปุ่มบันทึกข้อมูลที่ป้อนเข้ามา --}}
                                <br>
                                <input type="submit" value="อัพเดต" class="btn btn-primary">
                         

                            </form>
                        </div>
            </div> 
                 </div>
            </div>
        </div>
    </div>
</x-app-layout>