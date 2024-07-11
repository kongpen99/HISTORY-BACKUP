<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            สวัสดี ,{{Auth::user()->name}}
        </h2>
    </x-slot>
{{-- ทำการสร้างตารางข้อมูลแผกนก --}}
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">ตารางข้อมูล</div>
                        </div>
                    </div>
                    {{-- ทำการสร้างแบบฟอร์ม --}}
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">แบบฟอร์ม</div>

                            {{-- สร้างชุดตารางรับการกรอก ข้อมูลเข้ามา และเมื่อการกดปุ่มบันทึกจะทำให้เกิด action โดยให้ไปเรียกใช้งาน Route ที่มีชื่อว่า addDepartment--}}
                            <div class="card-body">
                                <form action="{{route('addDepartment')}}" method="post">
                                    {{-- @csrf เพื่อป้องกันการ แฮกระบบป้อนข้อมูลในแบบฟอร์มแบบสคิปข้อมูลเข้ามา --}}
                                    @csrf  
                                    <div class="form-group">
                                        <label for="department_name">ชื่อตำแหน่งงาน</label>
                                        {{-- รับค่า text ที่กรอกเข้ามาใน ชื่อตำแหน่งงาน  --}}
                                        <input type="text" class="form-control" name="department_name">
                                    </div>
                                    {{-- สร้างปุ่มบันทึกข้อมูลที่ป้อนเข้ามา --}}
                                    <br>
                                    <input type="submit" value="บันทึก" class="btn btn-primary">
                                </form>
                            </div>
                </div> 
             </div>
        </div>
    </div>
</x-app-layout>
