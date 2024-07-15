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
                    {{-- เพิ่มสถานะการแจ้งเตือนเมื่อทำการป้อนข้อมูล หนเ้ Forn เรียบร้อยแล้ว --}}
                    @if(session('success'))

                        {{-- ใช้ CSS ในการแจ้งเตือนเมื่อทำการป้อนข้อมูล หน้าฟอร์ม เรียบร้อยแล้ว --}}
                        <div class="alert alert-success">{{session('success')}}</div>

                        {{-- ถ้าใช้ Code ในการแจ้งเตือนให้เป็น Tab สีเขียวเมื่อเราทำการเพิ่มข้อมูลเรียบร้อยแล้ว --}}
                        {{-- <b>{{session('success')}}</b> --}}
                    @endif
                    <div class="card">
                        <div class="card-header">ตารางข้อมูลแผนก</div>
                        </div>
                    </div>
                    {{-- ทำการสร้างแบบฟอร์ม --}}
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">แบบฟอร์ม</div>

                            {{-- สร้างชุดตารางรับการกรอก ข้อมูลเข้ามา และเมื่อการกดปุ่มบันทึกจะทำให้เกิด action โดยให้ไปเรียกใช้งาน Route ที่มีชื่อว่า addDepartment--}}
                            <div class="card-body">
                                <form action="{{route('addDepartment')}}" method="post">
                                    {{-- @csrf เพื่อป้องกันการ แฮกระบบป้อนข้อมูลในแบบฟอร์มแบบสคิปข้อมูลเข้ามา --}}
                                    @csrf  
                                    <div class="form-group">
                                        <label for="department_name">ชื่อแผนก</label>
                                        {{-- รับค่า text ที่กรอกเข้ามาใน ชื่อตำแหน่งงาน  --}}
                                        <input type="text" class="form-control" name="department_name">
                                    </div>
                                    @error('department_name')
                                        <div class="my-2">
                                            <span class="text-danger">{{$message}}</span>
                                        </div>
                                    @enderror

                                    {{-- (););ร้างปุ่มบันทึกข้อมูลที่ป้อนเข้ามา --}}
                                    <br>
                                    <input type="submit" value="บันทึก" class="btn btn-primary">
                                </form>
                            </div>
                </div> 
             </div>
        </div>
    </div>
</x-app-layout>
