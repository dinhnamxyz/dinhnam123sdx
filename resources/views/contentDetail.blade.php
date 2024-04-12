<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - TheRunDownAi Admin</title>
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('assets/css/style_admin.css')}}">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body class="sb-nav-fixed">
        {{-- Phần navbar đầu trang --}}
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{route('TrangChu')}}">
                 <img src="{{ asset('assets/image/thumb_rundownlogonewsize.avif') }}" alt="logo_The_Rundown_AI" style="width: 42px; height: 42px; ">
                <span>The RunDown Ai</span>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        {{-- Navbar left --}}
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            {{--  --}}
                            <div class="sb-sidenav-menu-heading">POSTS</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                All Posts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('baiviet.getThem_bai_viet')}}">New Posts</a>
                                    <a class="nav-link" href="{{route('baiviet.DanhSachBaiViet')}}">Edit Posts</a>
                                </nav>
                            </div>

                            {{--  --}}
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                TOOL
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            {{--  --}}
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                        </div>
                    </div>
                    {{--  --}}
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin 
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Content management</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Posts >All Post >{{$baiviet[0]->title}} > Detail </li>
                        </ol>
                        <hr>
                        <hr>
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
                        
                            
                        <hr>
                       
                        <div class="card mb-4 bg-muted">
                            <div class="card-header ">
                                <i class="fas fa-table me-1"></i>
                                Content of your posts
                            </div>
                            <div class= "card-body">
                            
                                    
                                        
                                            <table class='table table-bordered table-hover'>
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>ID Nội Dung</th>
                                                        <th>Tiêu đề</th>
                                                        <th>URL hình ảnh</th>
                                                        <th>Nội dung</th>
                                                        <th>Thời gian tạo</th>
                                                        <th>Thời gian sửa</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                
                                                <tbody>
                                                    @foreach ($noidung as $item)
                                                    <tr>
                                                        
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->title}}</td>
                                                        
                                                        <td><img src="{{$item->image_path}}" alt="" style="width: 100px; height: 100px;"></td>
                                                        <td>{!!$item->content!!}</td>
                                                        <td>{{$item->created_at}}</td>
                                                        <td>{{$item->updated_at}}</td>
                                                        {{-- <td><a href="{{route('baiviet.getTao_noi_dung',['id_bai_viet'=>$item->id_posts])}}" class='btn btn-success'>Thêm</a></td> --}}
                                                        <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal_add">
                                                            Add
                                                          </button>
                                                          </td>
                                                        {{-- <td><a href="{{route('baiviet.gUpdate',['id'=>$item->id_posts , 'id_content' => $item->id_content ])}}" class='btn btn-success'>Sửa</a></td> --}}
                                                        <td><button type="button" class = "btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal_update">Update</button></td>
                                                        
                                                        <td><a href="{{route('baiviet.xoaNoiDung',['id'=>$item->id_posts , 'id_content'=>$item->id ])}}" class='btn btn-success'>Xóa</a></td>
                                                    </tr>
                                                        
                                                    @endforeach
                                                </tbody>
                                
                                            </table>
                                            
                                        
                                    
                        </div>
                           
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        {{-- Tạo modal --}}
        <div class="modal " id="myModal_add">
            <div class="modal-dialog modal-xl modal-dialog-center">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">New Content</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                  <form action="{{ route('baiviet.postTao_noi_dung', ['id' =>$item->id_posts , 'id_content'=>$item->id]) }}" method="post">
                    <div  class = "border border-dark rounded-3 border-3 my-5 ">
                        
                        <div class = "mx-3">
                             
                        
                                <label for="linhvuc" class="form-label mt-3">License:  </label>
                                <input type="text " class='form-control' id='linhvuc'  name ='linhvuc'>
                                @error('linhvuc')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
            
                                <label for="tieu_de_noi_dung" class="form-label mt-1">Title of content: </label>
                                <input type="text " class='form-control' id='tieu_de_noi_dung'  name ='tieudenoidung'>
                                @error('tieudenoidung')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
                                
            
                                <label for="url_hinh_anh" class="form-label mt-1">Image path: </label>
                                <input type='url' class='form-control' id='url_hinh_anh'  name ='urlhinhanh'>
                                @error('urlhinhanh')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
            
            
                                <label for="nguon_hinh_anh" class="form-label mt-1">Image source:  </label>
                                <input type="text " class='form-control' id='nguon_hinh_anh'  name ='nguonhinhanh'>
                                @error('nguonhinhanh')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
            
            
                                <label for="noi_dung" class="form-label mt-1">Content: </label>
                                <br>
                                <textarea class ='form-control' name="noi_dung" id="noidung" cols="160" rows="10" style="width: 100%;"></textarea>
                                @error('noi_dung')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
                                
                                
                                @csrf
                           
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                  
                        {{-- <a href="{{route('baiviet.getTao_noi_dung',['id'=>$item->id_posts , 'id_content' => $item->id_content ])}}" > --}}
                      
                          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">✔</button>
                      {{-- </a> --}}
                      </div>
                  </form>
                </div>
          
                <!-- Modal footer -->
                
          
              </div>
            </div>
          </div>



         
          {{-- Modal Update Content --}}
          <div class="modal " id="myModal_update">
            <div class="modal-dialog modal-xl modal-dialog-center">
              <div class="modal-content">
          
                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title"> 🔃Update your content</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
          
                <!-- Modal body -->
                <div class="modal-body">
                    
                  <form action="{{route('baiviet.Update', ['id'=>$item->id_posts, 'id_content'=>$item->id])}}" method="POST">
                    @method('PUT')
                        <div  class = "border border-dark rounded-3 border-3 my-5 ">
                        <div class = "mx-3">
                                <label for="linhvuc" class="form-label mt-3">License:  </label>
                               
                                <input type="text " class='form-control' id='linhvuc1'  name ='linhvuc' value="{{$item->license}}">
                                @error('linhvuc')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
                                
            
                                <label for="tieu_de_noi_dung" class="form-label mt-1">Title of content: </label>
                                <input type="text " class='form-control' id='tieu_de_noi_dung1'  name ='tieudenoidung' value="{!!$item->title!!}">
                                @error('tieudenoidung')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
                                
            
                                <label for="url_hinh_anh" class="form-label mt-1">Image path: </label>
                                <input type='url' class='form-control' id='url_hinh_anh1'  name ='urlhinhanh' value="{{$item->image_path}}">
                                @error('urlhinhanh')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
            
            
                                <label for="nguon_hinh_anh" class="form-label mt-1">Image source:  </label>
                                <input type="text " class='form-control' id='nguon_hinh_anh1'  name ='nguonhinhanh' value="{{$item->image_source}}">
                                @error('nguonhinhanh')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
            
            
                                <label for="noi_dung" class="form-label mt-1">Content: </label>
                                <br>
                                <textarea class ='form-control' name="noi_dung" id="noidung1" cols="160" rows="10" style="width: 100%;">{!!$item->content!!}</textarea>
                                @error('noi_dung')
                                    <span style="color:red ;font-size:10px">{{$message}}</span>
                                    <br>
                                @enderror
                                
                                @csrf
                           
                            
                        </div>
                    </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Submit</button>
                        </div>
                  </form>
                </div>
          
              </div>
            </div>
          </div>

          {{--  --}}
         







        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/createPosts.js')}}"></script>
</html>
