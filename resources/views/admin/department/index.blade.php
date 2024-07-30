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
                        {{-- เอามาแสดงผลในตารางข้อมูลของแผนกไปรับเอา department มาแสดง --}}
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อ</th>
                                        <th scope="col">ชื่อพนักงาน</th>
                                        <th scope="col">Created_At</th>
                                        {{-- {{-- ทำการเพิ่ม หัวตาราง Edit แก้ไข--}}
                                        <th scope="col">Edit</th>
                                     
                                </thead>
                                <tbody>
                                        {{-- ให้ทำการวนลูปจากตัวแปร, $departments ที่ส่งมาจากตัว Controller แล้วทำการดึงมาทีละแถว--}}
                                    @foreach($departments as $row)
                                <tr>    
                                        {{-- โดยทำการใส่คำสั่ง $departments ตามด้วยฟังก์ชั่น firstitem นำตัวแปรลูป ($loop) มาใช้งานดดยให้อ้างอิงลำดับจากสมาชิกที่อยู่ใน department ใน index.blade.php --}}
                                        <th>{{$departments->firstitem()+$loop->index}}</th>
                                        {{-- ให้ทำการอ้างอิงไปที่ department_name  --}}
                                        <td>{{$row->department_name}}</td>
                                           {{-- ให้ทำการเอา user_id เอาออกไป ไปเรียก function user แล้วก็ฟิวส์ name ก็จะสามารถดึงชื่อ คนหรือผู้ที่ทำการบันทึกข้อมูลออกมาแสดงผลได้ --}}
                                        <td>{{$row->name}}</td>
                                        <td>
                                            {{-- ทำการกรองข้อมูล ถ้า Row ในช่อง created_at มีค่าเป็นค่าว่างจะให้เป็นอะไร    --}}
                                            @if($row->created_at == null)
                                                {{-- ถ้าเป็นค่า null ให้แสดง "  ไม่ถูกนิยาม" --}}
                                                ไม่ถูกนิยาม
                                            @else
                                            {{-- แต่ถ้าไม่เป้นค่า null ,มีค่าจะให้ทำอะไรจะให้แสดง  created_at  --}}
                                                {{carbon\carbon::parse($row->created_at)->diffForHumans()}}
                                            @endif
                                        </td>
                                        {{-- ทำการสร้างแถว td โดยการสร้างป็น link และทำการใส่ Class Bootstart เพือสร้างปุ่มขึ้นมา  --}}
                                        <td>
                                            <a href="{{url('/department/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a>
                                        

                                        </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                            {{-- ให้แสดงต่อท้าย Table (ตาราง) โดยระบุ $department ที่ส่งมาแล้วทำการเรียกใช้งานฟังก์ชั่น links เพื่อเป็นการบอกว่าเราจะเอาหมายเลขหน้ามาแสดงต่อท้ายตาราง--}}
                                 {{$departments->links()}}
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