<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
</head>
<body >
    
    <h1 class ='text-center'> Danh sách bài viết</h1>
    <div class ='container '>
        <div class ='row '>
            <div>
                <a href="{{route('baiviet.getThem_bai_viet')}}" class ='btn btn-success btn-sm my-3 float-end'>Thêm bài viết mới</a>
            </div>
            <table class='table table-bordered table-hover table-info '>
                <thead>
                    <tr>
                        <th>ID Bài Viết</th>
                        <th>ID Nội Dung</th>
                        <th>Tiêu đề</th>
                        <th>Mô tả chung</th>
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
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id_bai_viet}}</td>
                        <td>{{$item->id_noi_dung}}</td>
                        <td>{{$item->tieu_de}}</td>
                        <td>{{$item->mo_ta_chung}}</td>
                        <td>{{$item->hinh_anh}}</td>
                        <td>{{$item->noi_dung}}</td>
                        <td>{{$item->thoi_gian_tao_bai_viet}}</td>
                        <td>{{$item->thoi_gian_sua}}</td>
                        <td><a href="{{route('baiviet.getTao_noi_dung',['id_bai_viet'=>$item->id_bai_viet])}}" class='btn btn-success'>Thêm</a></td>

                        <td><a href="{{route('baiviet.gUpdate',['id_noi_dung'=>$item->id_noi_dung])}}" class='btn btn-success'>Sửa</a></td>
                        
                        <td><a href="{{route('baiviet.xoaBaiViet',['id_bai_viet'=>$item->id_bai_viet])}}" class='btn btn-success'>Xóa</a></td>
                    </tr>
                        
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    
</body>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>

</html>