<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style_dangNhap.css')}}">
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    
</head>
<body>
<div class="container-fluid ">
    <div class = "container dangki">
       
        <h1 class="d-flex justify-content-center pt-5">Login </h1>
        <form action="" method="post">
            @csrf
            <div class ="mb-3 mt-3 fw-bold">
                <label for="username" class=" form-label"> User name </label>
                <input type="text" class="form-control" id="user_name" placeholder="Enter user name" name='user_name' value="{{old('user_name')}}">
                <span id="span_user"></span>
                @error('user_name')
                <span style="color : red">{{$message}}</span>
                @enderror
            </div>

            <div class ="mb-3 mt-2 fw-bold">
                <label for="password" class=" form-label"> Password </label>
                
                <input type="password" class="form-control" id="pass" placeholder="Enter password" name="pass" value="{{old('pass')}}">
                
                <span id = "span_pass"></span>
                @error('pass')
                <span style="color : red">{{$message}}</span>
                @enderror
            </div>
            


            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class = "btn  btn-outline-info btn-lg " id ="btn_login"   > Login</button>
            </div>



        </form>

        <div class="text-center mt-2 text-d">
            <a href="#" style ="text-decoration: none">Forgot Password ?</a>
            <a href="{{route('taikhoan.dangki')}}" style ="text-decoration: none">Sign Up</a>
        </div>
        
        
       

    </div>
</div>

    
</body>

<script src="{{asset('assets/js/Validate_dn.js')}}"></script>

</html>