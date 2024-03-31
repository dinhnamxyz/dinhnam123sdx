<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng kí</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style_dangki.css')}}">
    <script src="{{asset('assets/js/bootstrap.js')}}"></script>
    
</head>
<body>
<div class="container-fluid ">
    <div class = "container dangki">
       
        <h1 class="d-flex justify-content-center pt-5">Sign Up</h1>
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


            <div class ="mb-3 mt-2 fw-bold">
                <label for="password_confirm" class=" form-label"> Password Confirm </label>
                
                <input type="password" class="form-control" id="pass_cf" placeholder="Enter password confirm" name="pass_cf" value="{{old('pass_cf')}}">
                
                <span id = 'span_pass_check'></span>
                @error('pass_cf')
                <span style="color : red">{{$message}}</span>
                @enderror
            </div>


            <div class ="mb-3 mt-2 fw-bold">
                <label for="email" class=" form-label"> Email </label>
                
                <input type="email" class="form-control" id="email_user" placeholder="Enter your email" name="email" value="{{old('email')}}">
                
                <span id = "span_email"></span>
                @error('email')
                <span style="color : red">{{$message}}</span>
                @enderror
            </div>

            
            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class = "btn  btn-outline-info btn-lg " id ="btn_sign_up"   > Sign Up</button>
            </div>



        </form>

        <div class="text-center mt-2">
            <span style ="font-size: 14px">Do you already have an account ? | </span>
            <a href="{{route('taikhoan.dangnhap')}}" style ="text-decoration: none">Log in</a>
        </div>
        
       

    </div>
</div>

    
</body>

<script src="{{asset('assets/js/Validate_dk.js')}}"></script>

</html>