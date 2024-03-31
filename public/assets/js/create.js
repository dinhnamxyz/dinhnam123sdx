
var them =  document.getElementById('them_nd');
var add = document.getElementById('add_nd');
var html='';
them.addEventListener('click', function()
{   
    html +=`
      
        
    <div class = 'row mt-2'>
    <div class ='col border border-dark border-3 rounded-3'>
        <form action="" method="post" class = 'mt-3'>
            <label for="linhvuc" class="form-label mt-1">Lĩnh vực:  </label>
            <input type="text " class='form-control' id='linhvuc'  name ='linhvuc'>

            <label for="tieu_de_noi_dung" class="form-label mt-1">Tiêu đề của nội dung: </label>
            <input type="text " class='form-control' id='tieu_de_noi_dung'  name ='tieudenoidung'>

            <label for="url_hinh_anh" class="form-label mt-1">Đường dẫn tới hình ảnh: </label>
            <input type='url' class='form-control' id='url_hinh_anh'  name ='urlhinhanh'>

            <label for="nguon_hinh_anh" class="form-label mt-1">Nguồn hình ảnh:  </label>
            <input type="text " class='form-control' id='nguon_hinh_anh'  name ='nguonhinhanh'>

            <label for="noi_dung" class="form-label mt-1">Nội dung: </label>
            <br>
            <textarea class ='form-control' name="noi_dung" id="noidung" cols="160" rows="10" style="width: 100%;"></textarea>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <button class='btn btn-success float-end my-3'> Xác nhận</button>
            
        </form>
    </div>
</div>
        
    `;
    add.innerHTML = html;
});
