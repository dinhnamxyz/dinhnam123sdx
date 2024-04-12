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
</head>
<body>
        {{-- Navbar --}}
        @include('layouts.navbar')

        {{-- Header trang --}}
        @include('layouts.header')


        {{-- Thanh tim kiem --}}
        @include('layouts.search')
        <div class ="container mt-3" >
            <button type="button" class="btn btn-sm border border-1 border-dark rounded-3 " id="btnClear"> X Clear Filters</button>
        </div>
        

        
        <div class = "container mt-5 pb-5 mb-5">
            <div class = "row " id="ds_post">
                @php
                    $tam = null;
                @endphp
            @foreach ($data as $item)
                
                    @if ($item->id !==$tam)
                        
                        <div class ="col-sm-6 col-md-4 col-xl-4 mb-4  ">
                            <a href="{{route('baiviet.ChiTietBaiViet',['id'=>$item->id])}}" class ='text-decoration-none'>
                                <div class = "card h-100">
                                    @foreach($item->contents as $item1)
                                    <img  src='{{$item1->image_path}}' class = "rounded" alt="Ảnh đại diện" class ="w-100">
                                    @endforeach
                                    <div class ="card-body">
                                        <h3>{{$item->title}}</h3>
                                        <p style ='font-size:16px;'>{{$item->plus}}</p>
                                    </div>
                                    <div class = "card-footer">
                                        <ul class = "list-unstyled">
                                            <li class = "fw-bold">{{$item->author->author_name}}</li>
                                            <li>{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>                        
                    @endif
                    @php
                        $tam = $item->id;
                    @endphp
              
            @endforeach

            {{-- load more --}}
            {{-- <div class ="col-sm-6 col-md-4 col-xl-4 mb-4">
                <div class = "card h-100">
                    <div class="card-body d-flex justify-content-center align-items-center " >
                        <a href="#" class ="card-link  fs-1 text-decoration-none text-dark ">Load more</a>
                    </div>
                    
                </div>
            </div> --}}
            </div>
        </div>

   

        
        <footer>
            @include('layouts.footer')
        </footer>
    
</body>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/btnClear.js')}}"></script>

</html>