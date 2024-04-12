<?php

namespace App\Http\Controllers;

use App\Jobs\NewJob;
use App\Jobs\NewJob2;
use App\Jobs\SendMail_Job;
use App\Jobs\sendMailJob;
use App\Mail\sendMail;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Content;
use App\Models\Author;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{   
    private $post;
    public function __construct(Post $post)
    {
        $this->post  = $post;   
        
    }

    public function showPost(Request $request)
    {
        $data = $this->post->getPost();
        return view('TrangChu',compact('data'));

    }

    public function searchPosts(Request $request)
    {   
        
        $keywords = $request->input('keyword');
        $data = $this->post->Search($keywords);
        
    
        return view('searchPosts', compact('data','keywords'));
    }

// thêm bai viet
    public function Them_bai_viet()
    {
        // return view('Create');
        return view('createPosts');
    }

    public function postThem_bai_viet(Request $request)
    {
        $request->validate(['tieu_de' =>'required',
                            'tac_gia'=>'required',
                            'mo_ta_chi_tiet' =>'required'],

                            ['required' =>'Không được để trống'
                            ]);

        $data_posts = [
                    'title'=>$request->tieu_de,
                    'plus'=>$request->mo_ta_chung,
                    'author_id'=>$request ->tac_gia,
                    'created_at'=>now(),
                    'post_describe'=>$request->mo_ta_chi_tiet];
        $this->post->addBaiViet($data_posts);


        $id = $this->post->getIdBaiViet();

        $id_bai_viet = intval($id->id);
        



        for( $i = 0; $i <10;$i++)
        { 
            if($request->input("linhvuc_$i") !== null)
            {
                $data = [ 
                'id_posts'=>$id_bai_viet,
                'license'=>$request->input("linhvuc_$i"),
                'title'=>$request->input("tieudenoidung_$i"),
                'image_path'=>$request->input("urlhinhanh_$i"),
                'image_source'=>$request->input("nguonhinhanh_$i"),
                'content'=>$request->input("noi_dung_$i"),

                ];
                $this->post->addNoiDung($data);
            }else
            {
                break;
            }
            
        }

        $emailJob = new sendMailJob();
        dispatch($emailJob);
        return redirect()->back();
        
        // return redirect()->route('baiviet.getTao_noi_dung',['id_bai_viet'=>$id_bai_viet]  
    }

// them noi dung bai viet
    public function themND()
    {   
        $id_bai= $this->post->getIdBaiViet();
        return $id_bai;
    }

    public function postThemND(Request $request)
    {
        $request->validate(['linhvuc'=>'required',
                            'tieudenoidung'=>'required',
                            'urlhinhanh'=>'required',
                            'noi_dung'=>'required'
                            ],
                            ['required'=>'Không được để trống'
                           ]);

        
        
        $data = [
                'id_posts'=>$request->id,
                'license'=>$request->linhvuc,
                'title'=>$request->tieudenoidung,
                'image_path'=>$request->urlhinhanh,
                'image_source'=>$request->nguonhinhanh,
                'content'=>$request->noi_dung];
       

        
        $this->post->addNoiDung($data);
        return redirect()->back();
    }


    public function danhSachBaiViet()
    {   $data = $this->post->getAllPost();
        $so_bai = $this->post->countPost();
        $so_tac_gia =$this->post->countTacGia();
        $so_noi_dung= $this->post->countContent();
        
        return view('Dashboard',compact('data','so_bai','so_tac_gia', 'so_noi_dung'));
    }

    public function postDetail()
    {
        $data = $this->post->getAllPost();
        return view('postDetail',compact('data'));
    }


    public function xoaBaiViet(Request $request)
    {
        $id_posts = $request->id;
        
        
        $this->post->deletePost($id_posts);
        return redirect()->back();
    }

    public function deleteContent(Request $request)
    {   
        $id_content = $request->id_content;    
        $this->post->deleteContent($id_content);
        return redirect()->back();
    }





    public function BlogDetail(Request $request)
    {   
        $id = $request->id;
       
        $baiviet = $this->post->getBlogDetail_1($id);
        $noidung = $this->post->getBlogDetail_2($id);
        $dexuat = $this->post->DeXuat();
        $quick_hit = $this->post->QuickHit();
        $tools = $this->post->getTool();
        
        
        
        return view('BlogDetail',compact('baiviet','noidung','dexuat','quick_hit','tools'));
    }

    // Sua noi dung
    public function getUpdate(Request $request)
    {   
        $id = $request->id;
        $baiviet = $this->post->getBlogDetail_1($id);
        $noidung = $this->post->getBlogDetail_2($id);
        $noi_dung = $this->post->getContent($request->id_content);
        
        return view('contentDetail',compact('baiviet','noidung','noi_dung'));
    }

    public function postUpdate(Request $request)
    {
        $request->validate(['linhvuc'=>'required',
                            'tieudenoidung'=>'required',
                            'urlhinhanh'=>'required',
                            'noi_dung'=>'required'
                            ],
                            ['required'=>'Không được để trống'
                           ]);

        $data = [
                'license'=>$request->linhvuc,
                'title'=>$request->tieudenoidung,
                'image_path'=>$request->urlhinhanh,
                'image_source'=>$request->nguonhinhanh,
                'content'=>$request->noi_dung,
                'updated_at'=>now(),
                ];
        $id = ['id'=>$request->id_content];
        
        $this->post->UpdateContent($data,$id);
        return redirect()->back();

    }

   
    

   

}