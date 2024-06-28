<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เกี่ยวกับเรา</title>
</head>
<body>
    <h1>DB_Backup Histoty</h1>

    <p>ที่อยู่ : {{$address}} </p>
    <p>เบอร์ติดต่อ : {{$tel}} </p>
    <p>email : {{$email}} </p>
    <p>email : {{$error}} </p>
    <p>status : {{$status}} </p>

    
    <a href="{{url('/')}}">Home</a>
    <a href="{{url('/admin')}}">Admin</a>
    <a href="{{url('/member')}}">Member</a>
    <a href="{{url('/about')}}">About</a>

</body>
</html>