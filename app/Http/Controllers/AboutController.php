<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index(){
        //ตัวแปร $city กำหนดค่า = "123 กรุงเทพ, ประเทศไทย";

        $address = "123 กรุงเทพ, ประเทศไทย";
        $tel = "1234567890";
        $email = "kongpeng99@gmail.com";

  //ส่งค่าเป็นแบบ Arry 
        // return view('about',['address' => $address,'tel' => $tel,'email'=> $email]);

//ส่งค่าเป็น Compact เป็นกลุ่ม
        // return view('about',compact('address','tel','email'));

//การส่ง ค่าด้วยฟังก์ชั่น With
        return view('about')
        ->with ('address',$address)
        ->with ('tel',$tel)
        ->with ('email',$email)
        ->with ('error','404 Not Found')
        ->with ('status','บันทึกข้อมูลเรียบร้อย');

    }

}
 