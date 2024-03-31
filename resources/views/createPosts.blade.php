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
                        <h1 class="mt-4">New Posts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard > Posts > NewPosts </li>
                        </ol>
                        
                            
                        
                        
                        <div class="card mb-4">
                            
                            <div class="card-body">
                                <form action="" method="post">
                                    @csrf
                                    
                                        <div class = "border border-dark rounded-3 border-3 " >
                                            <h3 class = " fs-3 py-3 px-3" style ="background-color:rgb(245,245,245)">New Posts</h3>
                                            
                                            <div class = "mx-3">
                                                
                                                    <label for="tieude" class="form-label mt-1">Title: </label>
                                                    <input type='text' class='form-control' id='tieude'  name ='tieu_de' value='{{old('tieu_de')}}' >
                                                    @error('tieu_de')
                                                        <span style ="color:red ">{{$message}}</span>
                                                        <br>
                                                    @enderror
                                
                                                    <label for="mo_ta_chung" class="form-label mt-1">Plus: </label>
                                                    <input type="text" class='form-control' id='mo_ta_chung'  name ='mo_ta_chung' value='{{old('mo_ta_chung')}}'>
                                                    @error('mo_ta_chung')
                                                    <span style ="color:red ">{{$message}}</span>
                                                    <br>
                                                    @enderror
                                
                                                    <label for="tac_gia" class="form-label mt-1">Author:  </label>
                                                    <input type="text" class='form-control' id='tac_gia'  name ='tac_gia'value='{{old('tac_gia')}}'>
                                                    @error('tac_gia')
                                                    <span style ="color:red ">{{$message}}</span>
                                                    <br>
                                                    @enderror
                                
                                                    <label for="mo_ta_chi_tiet" class="form-label mt-1">Describe: </label>
                                                    <br>
                                                    <textarea class ='form-control' name="mo_ta_chi_tiet" id="mo_ta_chi_tiet" cols="160" rows="5" style="width: 100%;" ></textarea>
                                                    @error('mo_ta_chi_tiet')
                                                    <span style ="color:red ">{{$message}}</span>
                                                    <br>
                                                    @enderror
                                
                                                    {{-- <button class='btn btn-success float-end mt-3 mb-2'> Xác nhận</button> --}}
                                                    
                                            </div>
                                        </div>
                        
                                        <div  class = "border border-dark rounded-3 border-3 my-5 ">
                                            <h3 class = " fs-3 py-3 px-3" >New Content</h3>
                                            
                                            <div class = "mx-3">
                                                 
                                            
                                                    <label for="linhvuc" class="form-label mt-1">License:  </label>
                                                    <input type="text " class='form-control' id='linhvuc'  name ='linhvuc_0'>
                                                    
                                
                                                    <label for="tieu_de_noi_dung" class="form-label mt-1">Title of content: </label>
                                                    <input type="text " class='form-control' id='tieu_de_noi_dung'  name ='tieudenoidung_0'>
                                                   
                                                    
                                
                                                    <label for="url_hinh_anh" class="form-label mt-1">Image path: </label>
                                                    <input type='url' class='form-control' id='url_hinh_anh'  name ='urlhinhanh_0'>
                                                    
                                
                                
                                                    <label for="nguon_hinh_anh" class="form-label mt-1">Image source:  </label>
                                                    <input type="text " class='form-control' id='nguon_hinh_anh'  name ='nguonhinhanh_0'>
                                                    
                                
                                
                                                    <label for="noi_dung" class="form-label mt-1">Content: </label>
                                                    <br>
                                                    <textarea class ='form-control' name="noi_dung_0" id="noidung" cols="160" rows="10" style="width: 100%;"></textarea>
                                                    
                                                    
                                                    
                                                   
                                               
                                                
                                            </div>
                                        </div>
                        
                                        <div id = "content">
                        
                                        </div>
                                        
                                        
                                    
                                    <button type="submit" class='btn btn-success float-end btn-sm  my-3 mx-3'> Submit</button>
                                    <button type="button" class ="btn btn-success float-end btn-sm  my-3 mx-3" id="addC">➕ </button>
                                    
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('assets/js/createPosts.js')}}"></script>
    </body>
</html>
