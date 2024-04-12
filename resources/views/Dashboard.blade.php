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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Welcome to The RunDown AI </li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4 text-center">
                                    <div class="fs-3 text-center">Number of articles</div>
                                    <hr>
                                    <div>
                                        <img src="{{asset('assets/image/bai_viet.png')}}" alt="" style ="width: 110px;height: 110px; margin-right: 50px;">
                                        <span class = "fs-3 ">{{$so_bai[0]->so_bai}}</span></div>
                                    </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="fs-3 text-center card bg-info">
                                    <div >Number of authors</div>
                                    <hr>
                                    <div style ="padding:25px 0 25px;">
                                        <img src="{{asset('assets/image/tac_gia.png')}}" alt="" style ="width: 60px;height: 60px; margin-right: 80px; ">
                                        <span>{{$so_tac_gia[0]->so_tac_gia}}</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4 fs-3 text-center">
                                    <div >Number of contents</div>
                                    <hr>
                                    <div style ="padding:5px 0 5px;">
                                        <img src="{{asset('assets/image/noi_dung.png')}}" alt="" style ="width: 100px;height: 100px; margin-left: -20px; margin-right: 80px; ">
                                        <span>{{$so_noi_dung[0]->so_noi_dung}}</span>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List Of Posts
                            </div>
                            <div class="card-body">
                                <table class = "table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID Bài Viết</th>
                                            <th>ID Nội Dung</th>
                                            <th>Tiêu đề</th>
                                            <th>Mô tả chung</th>
                                            <th>Hình ảnh</th>
                                            <th>Nội dung</th>
                                            <th>Thời gian tạo</th>
                                            <th>Thời gian sửa</th>
                                           
                                           
                                        </tr>
                                    </thead>
                                    
                                    
                                    <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->id_content}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->plus}}</td>
                                            <td><img src="{{$item->image_path}}" alt="" style ="width: 80px; height: 60px;"></td>
                                            <td>{!!$item->content!!}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->updated_at}}</td>
                                            {{-- <td>
                                                <ul class = "list-unstyled my-5">
                                                    <li><a href="{{route('baiviet.getTao_noi_dung',['id_bai_viet'=>$item->id_bai_viet])}}" class='btn btn-success'>➕</a></li>
                                                    <li class = "my-3"><a href="{{route('baiviet.gUpdate',['id_noi_dung'=>$item->id_noi_dung])}}" class='btn btn-success'>Edit</a></li>
                                                    <li class = "my-3"><a href="{{route('baiviet.xoaBaiViet',['id_bai_viet'=>$item->id_bai_viet])}}" class='btn btn-success'>➖</a></li>
                                                    <li><a href="{{route('baiviet.getTao_noi_dung',['id_bai_viet'=>$item->id_bai_viet])}}" class='btn btn-success'>Detail</a></li>
                                                </ul>
                                                
                                            </td> --}}
                    
                                           
                                        </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
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
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
