<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <?php
        
        $user ="kongpeng99";

        //! สร้าง Array ใช้ในการวนลูป
        $arr = array("Home","Member","About","Contact");


        ?>

    <!--การกำหนดเงื่อนไขใน Blaed -->

@if($user == "kongpeng99")
<h1 style="color: blue">ยินดีต้อนรับแอดมิน {{$user}} </h1>

    <!--ชื่อตัวแปร $user แสดงข้อมูลใน Blade ปีกกาทำหน้าที่แสดงผล -->
<h1>{{$user}}</h1>
     <!--ในกรณีเงื่อนไขเป็นจริง-->

     <h1 style="color: green">ผู้ใช้ท่านนี้เป็นแอดมิน</h1>
@else
      <!--ในกรณีเงื่อนไขเป็นเท็จ-->
    <h1>ผู้ใช้ท่านไม่ได้นี้เป็นแอดมิน</h1>  

@endif

<!--การวนลูปโดยการใช้ Foreach -->
<!--สร้างเมนู array วนลูป  $arr = array("Home","Member","About","Contact"); -->

@foreach ($arr as $menu)
    <a href=" ">{{$menu}}</a> 
    
@endforeach
<!--การวนลูปโดยการใช้ Foreach -->

<!--//////////////////////////////////////////////////////////////////-->

<!--การวนลูปโดยการใช้ For -->
<!--สร้างเมนู array วนลูป  $arr = array("Home","Member","About","Contact"); -->

<ul>
@for($i=1; $i <=5; $i++)

<!--แสดงผล 1,2,3,4,5 -->
<li>{{$i}}</li>
    
@endfor
<!--การวนลูปโดยการใช้ Foreach -->
</ul>

</body>
</html> 