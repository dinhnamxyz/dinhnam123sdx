<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> The RunDown Ai</title>
    <link rel="icon" type="image/icon" href="{{asset('assets/image/thumb_rundownlogonewsize.avif')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
        {{-- Navbar --}}
        @include('layouts.navbar')
        <div class = "container mt-5 fs-5">
            The RunDown Ai > Archive > {{$keywords}};
        </div>
        <div class = "container mt-5 fs-2">
            Search The Rundown AI Posts
        </div>

        {{-- Thanh tim kiem --}}
        @include('layouts.search')
        <div class ="container mt-3" >
            <button type="button" class="btn btn-sm border border-1 border-dark rounded-3 " id="btnClear"> X Clear Filters</button>
        </div>
        

        
        <div class = "container mt-5 pb-5 mb-5">
            <div class = "row " id="ds_post">
                @if(empty($data))
                    <img src="{{asset('assets/image/kinh_lup.png')}}" alt="" style="width: 250px; height: 250px;" class = "mx-auto" >
                    <span class = 'text-center fs-3 mt-5'>No Posts Found</span>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('TrangChu') }}">
                            <button type="button" class="btn btn-xl btn-success border border-3 rounded-3 mt-3">Home</button>
                        </a>
                    </div>
                @else
                    @php
                    $tam = null;
                    $hien_thi = false;
                    @endphp
                    @foreach ($data as $item)
                
                    @if ($item->id !==$tam)
                        @php
                        $hien_thi=true;
                        @endphp
                        <div class ="col-sm-6 col-md-4 col-xl-4 mb-4  ">
                            <a href="{{route('baiviet.ChiTietBaiViet',['id'=>$item->id])}}" class ='text-decoration-none'>
                                <div class = "card h-100">
                                    <img  src='{{$item->image_path}}' class = "rounded" alt="Ảnh đại diện" class ="w-100">
                                    <div class ="card-body">
                                        <h3>{{$item->title}}</h3>
                                        <p style ='font-size:16px;'>{{$item->plus}}</p>
                                    </div>
                                    <div class = "card-footer">
                                        <ul class = "list-unstyled">
                                            <li class = "fw-bold">{{$item->author_name}}</li>
                                            <li>{{ \Carbon\Carbon::parse($item->create_time)->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>                        
                    @endif
                    @php
                        $tam = $item->id_posts;
                    @endphp
              
                    @endforeach
                    @if (!$hien_thi)
                    <img src="{{asset('assets/image/kinh_lup.png')}}" alt="" style="width: 250px; height: 250px;" class = "mx-auto" >
                    <span class = 'text-center fs-3 mt-5'>No Posts Found</span>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('TrangChu') }}">
                            <button type="button" class="btn btn-xl btn-secondary border border-3 rounded-3 mt-3">Home</button>
                        </a>
                    </div>
                    @endif
                @endif

            
            </div>
        </div>

   

        
        <footer>
            @include('layouts.footer')
        </footer>
    
</body>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/btnClear.js')}}"></script>

</html>