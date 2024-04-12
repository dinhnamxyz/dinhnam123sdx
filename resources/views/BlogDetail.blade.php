<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >{{$baiviet[0]->title}}</title>
    <link rel="icon" type="image/icon" href="{{asset('assets/image/thumb_rundownlogonewsize.avif')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/blogdetail.css')}}">
    
</head>


<body >
    @include('layouts.navbar')
    <div class ="container-fluid">
        <div class= "row">
            <div class = "col-sm-6 mx-auto pt-3 ">
                <div class="container">
                    <h6 style="font-size: 12px">The RunDown AI > Posts > {{$baiviet[0]->title}}</h6>
                    
                    <h1>{{$baiviet[0]->title}}</h1>
                    <h1 class ="display-6 fw-" style="font-size: 23px; font-weight: 400; color:#929292">PLUS: {{$baiviet[0]->plus}} </h1>
                    <div class = "d-flex justify-content-between mt-4">
                        <ul class = "list-unstyled d-flex">
                            <li class = "my-auto " style ="margin-right: 15px;">
                                <img src="{{asset('assets/image/anhdaidien.jpg')}}" alt="ảnh tác giả" style ="with:30px;height: 30px" class ="rounded-circle ">
                            </li>
                            <li class = >
                                <ul class = "list-unstyled ">
                                    <li><a href="#" class = "text-dark"> {{$baiviet[0]->author_name}}</a></li>
                                    <li> {{ \Carbon\Carbon::parse($baiviet[0]->created_at)->diffForHumans() }}</li>
                                </ul>
                            </li>
                        </ul>

                        <ul class = "list-unstyled d-flex  my-auto">
                            <li><a href="https://www.facebook.com"><img src="{{asset('assets/image/logoface.jpg')}}" alt="Logo Facebook" style ="width:25px;height: 25px; " class ="rounded-circle "></a></li>
                            <li><a href="https://twitter.com"></a><img src="{{asset('assets/image/Tiwtter.jpg')}}" alt="X " style ="width:25px;height: 25px; " class ="rounded-circle mx-3"></li>
                            <li><a href="https://www.linkedin.com/"><img src="{{asset('assets/image/in.png')}}" alt="In" style ="width:25px;height: 25px; " class ="rounded-circle mr-5"></a></li>
                        </ul>
                    </div>
                        <div class ="d-flex justify-content-center mt-4">
                            <ul  class ="list-unstyled d-flex fw-bold ">
                                <li><a href="{{route('taikhoan.dangki')}}">Sign Up</a></li>
                                <li class= "mx-2">|</li>
                                <li><a href="#">Advertise </a></li>
                                <li class= "mx-2">|</li>
                                <li ><a href="#">Jobs </a></li>
                                <li class="mx-2">|</li>
                                <li><a href="#">Tools </a></li>
                        </ul>
                        </div>
                
                </div>
                <div class="mb-4 container"> 
                    <a href="#">
                        <img  class = "img-fluid rounded-3" src="https://media.beehiiv.com/cdn-cgi/image/fit=scale-down,format=auto,onerror=redirect,quality=80/uploads/asset/file/54f383b9-97b6-455e-8ec8-652add1e3c44/cleo.png?t=1706580605" alt="" >
                    </a>
                </div>
                {{-- Mô tả chi tiết --}}
                <div class = "border border-dark border-3 rounded-3 text-center container">
                    <h3 class ='fw-bold my-4'>Welcome, AI enthusiasts.</h3>
                    <p class ="fs-5 mx-5">
                        {!!$baiviet[0]->post_describe!!}
                    </p>
                    <hr class="border border-dark border-2" >
                    <div class = "fw-bold text-start fs-5 " style="margin-left: 20px; margin-top: 30px ">
                    <span >In today’s AI rundown:</span>
                    @foreach ($noidung as $item)
                    <ul style ="margin-left: 40px ;margin-top: 15px;" >
                        <li class="my-2">{{$item->title}}</li>
                        
                    </ul>
                    @endforeach
                    <h5 style="font-weight:300; font-size:16px;"><i>Read time: 4 minutes</i></h5>
                    </div>
                </div>

                {{--  --}}
                <div class ="bg-dark my-3 text-center text-light py-3 rounded-3 container">
                    <h3 class ="fs-5">LATEST DEVELOPMENTS</h3>
                </div>

                {{-- Các nội dung --}}
                @foreach ($noidung as $item)
                <div class = "border border-dark border-3 rounded-3 my-4 container">
                    <div class = "px-3 mt-2">
                        <span class = "text-uppercase">{{$item->license}}</span>
                        <h3>{{$item->title}}</h3>
                        <div class="text-center ">
                            <img class ="img-fluid" src="{{$item->image_path}}" alt="" >
                        </div>
                        <span class = " mb-4" style="font-size: 13px;"><i>Image source: {{$item->image_source}}</i></span>
                        <div class = "fs-5">
                            
                                {!!$item->content!!}
                        
                        </div>
                    </div>

                </div>
                    
                @endforeach
                {{--  --}}
                <div class ="bg-dark my-3 text-center text-light py-3 rounded-3 container">
                    <h3 class ="fs-5">NEW TOOLS & JOBS</h3>
                </div>
                {{-- New Tools & jobs --}}
                <div class="border border-dark border-3 rounded-3 my-4 container">
                 <div class = "px-3 mt-2 fs-5">
                    @foreach ($tools as $item)
                    <h3 class ="my-2">{{$item->tool_title}}</h3>
                    {!! $item->tool_content !!}
                    @endforeach
                 </div>

                </div>
                {{--  --}}

                <div class ="bg-dark my-3 text-center text-light py-3 rounded-3 container">
                    <h3 class ="fs-5">QUICK HITS</h3>
                </div>


                {{-- QUICK HITS --}}
                <div class ="border border-dark border-3 rounded-3 my-4 container">
                    <div class = "px-3 mt-2 fs-5">
                        @foreach ($quick_hit as $item)
                        <h3 >{{$item->quick_title}}</a></h3>
                        {!!$item->quick_content!!}
                        @endforeach
                    </div>
                </div>

                {{--  --}}
                <div class ="bg-dark my-3 text-center text-light py-3 rounded-3 container">
                    <h3 class ="fs-5">THAT’S A WRAP</h3>
                </div>

                {{--  --}}
                <div class = "border border-dark border-3 rounded-3 my-4 container">
                    <div class = "px-3 mt-2">
                        <span class = "text-uppercase">SPONSOR US</span>
                        <br>
                        <span class ="fs-3 fw-bold ">Get your product in front of over 450k+ AI enthusiasts</span>
                        <p class ="fs-5 mt-3">Our newsletter is read by thousands of tech professionals, investors, engineers, managers, and business owners around the world.
                            <a href="#" class="text-decoration-underline" >Get in touch today.</a>
                        </p>
                    </div>
                </div>

                <div class = "border border-dark border-3 rounded-3 my-4 container">
                    <div class = "px-3 mt-2">
                        <span class = "text-uppercase mb-3">FEEDBACK</span>
                        <br>
                        <br>
                        <span class = "fs-3 fw-bold">How would you rate today's newsletter?</span>
                        <br>
                        <span class = "fs-5">Vote below to help us improve the newsletter for you.</span>
                        <br>
                        <ul class = "list-unstyled px-4 my-3">
                            <li ><a href="{{route('TrangChu')}}" class = "text-decoration-underline text-dark fw-bold">⭐️⭐️⭐️⭐️⭐️ Nailed it</a></li>
                            <li ><a href="{{route('TrangChu')}}" class = "text-decoration-underline text-dark fw-bold">⭐️⭐️⭐️ Average</a></li>
                            <li ><a href="{{route('TrangChu')}}" class = "text-decoration-underline text-dark fw-bold">⭐️ Epic Fail</a></li>
                        
                        </ul>
                        <span style="color:#929292; font-size: 13px"><a href="{{route('taikhoan.dangnhap')}}" style="color:#929292 ; text-decoration:underline ">Login</a> or <a href="https://www.therundown.ai/subscribe" style="color:#929292 ; text-decoration:underline">Subscribe</a> to participate in polls.</span>
                        <br>
                        <p class ="fs-5 py-3">If you have specific feedback or anything interesting you’d like to share, please let us know by <b>replying to this email.</b></p>

                    </div>
                </div>

                <div class="my-5 container">
                    <h4 class="fw-bold">Join the conversation</h4>
                    <form action="" method="post" class ="my-3 mb-3">
                        <textarea class ='form-control binhluan' name="binh_luan" id="binhluan" cols="160" rows="5" style="width: 100%;" placeholder="Add your comment ..."></textarea>
                        <button type="submit" class = 'btn btn-primary btn-sm float-end my-1 rounded-3'> Send </button>
                        
                    </form>
                    <span style="color:#929292; font-size: 16px;"><a href="{{route('taikhoan.dangnhap')}}" style="color:#929292 ; text-decoration:underline ">Login</a> or <a href="https://www.therundown.ai/subscribe" style="color:#929292 ; text-decoration:underline">Subscribe</a> to participate</span>
                </div>


                <div class ="my-2 container">
                    <h4 class = "fw-bold my-3">Keep reading</h4>
                    <div class = "container-fluid ">
                        @php
                            $tam = null;
                        @endphp
                        @foreach ($dexuat as $item)
                            @if ($item->id !== $tam)
                            <a href="{{route('baiviet.ChiTietBaiViet',['id'=>$item->id])}}" class ='text-decoration-none text-dark'>
                                <div class = "row d-flex justify-content-between">
                                    <div class = "col-6">
                                        @foreach($item->contents as $item1)
                                        <img class= "img-fluid rounded-3" src="{{$item1->image_path}}" alt="">
                                        @endforeach
                                    </div>
                                    <div class ="col-6">
                                        <h5>{{$item->title}}</h5>
                                        <p style = "font-size: 14px;">{{$item->plus}}</p>
                                        <span>{{$item->created_at}}</span>
                                    </div>
                                </div>
                            </a>
                            <br>
                            <br>
                                
                            @endif
                            @php
                                $tam = $item->id;
                            @endphp
                            
                        @endforeach
                    </div>

                <a  href="{{route('TrangChu')}}">View more ></a>
                <br>
                </div>

            </div>
        </div>
    </div>
    
</body>
<footer>
    @include('layouts.footer')
</footer>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>

</html>