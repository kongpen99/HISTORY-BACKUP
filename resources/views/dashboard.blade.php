<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- <h1 style="color: blue">ข้อมูลผู้ใช้ ,{{Auth::user()->name}}</h1> --}}
            <b style="color: green" class='float-end'>จำนวนผู้ใช้งานระบบ {{count($users)}} คน </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">อีเมล</th>
                            <th scope="col">เริ่มใช้งานระบบ</th>
                      </tr>
                    </thead>
                    <tbody>
                        {{--  @php($i=1) ทำการเพิ่มลำดับของตัวเลขที่อยู่ในตารางออกมา 1,2,3,4,5 ในแต่ละแถว  --}}
                        @php($i=1)
                        @foreach($users as $row)
                      <tr>
                            <th>{{$i++}}</th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{Carbon\Carbon::parse($row->created_at)->diffForHumans()}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</x-app-layout>
