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
          <form action="{{route('baiviet.Update', ['id'=>$item->id_posts, 'id_content'=>$item->id_content])}}" method="POST">
                <div  class = "border border-dark rounded-3 border-3 my-5 ">
                
                <div class = "mx-3">
                     
                
                        <label for="linhvuc" class="form-label mt-3">License:  </label>
                        <input type="text " class='form-control' id='linhvuc1'  name ='linhvuc' value="{{$noi_dung[0]->license}}">
                        @error('linhvuc')
                            <span style="color:red ;font-size:10px">{{$message}}</span>
                            <br>
                        @enderror
    
                        <label for="tieu_de_noi_dung" class="form-label mt-1">Title of content: </label>
                        <input type="text " class='form-control' id='tieu_de_noi_dung1'  name ='tieudenoidung' value="{!!$noi_dung[0]->title!!}">
                        @error('tieudenoidung')
                            <span style="color:red ;font-size:10px">{{$message}}</span>
                            <br>
                        @enderror
                        
    
                        <label for="url_hinh_anh" class="form-label mt-1">Image path: </label>
                        <input type='url' class='form-control' id='url_hinh_anh1'  name ='urlhinhanh' value="{{$noi_dung[0]->image_path}}">
                        @error('urlhinhanh')
                            <span style="color:red ;font-size:10px">{{$message}}</span>
                            <br>
                        @enderror
    
    
                        <label for="nguon_hinh_anh" class="form-label mt-1">Image source:  </label>
                        <input type="text " class='form-control' id='nguon_hinh_anh1'  name ='nguonhinhanh' value="{{$noi_dung[0]->image_source}}">
                        @error('nguonhinhanh')
                            <span style="color:red ;font-size:10px">{{$message}}</span>
                            <br>
                        @enderror
    
    
                        <label for="noi_dung" class="form-label mt-1">Content: </label>
                        <br>
                        <textarea class ='form-control' name="noi_dung" id="noidung1" cols="160" rows="10" style="width: 100%;">{!!$noi_dung[0]->content!!}</textarea>
                        @error('noi_dung')
                            <span style="color:red ;font-size:10px">{{$message}}</span>
                            <br>
                        @enderror
                        
                        
                        @csrf
                   
                    
                </div>
            </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Xác nhận</button>
                </div>
          </form>
        </div>
  
        
        
  
      </div>
    </div>
  </div>
