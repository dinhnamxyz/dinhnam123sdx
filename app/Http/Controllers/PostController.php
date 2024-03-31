<?php

namespace App\Http\Controllers;

use App\Jobs\NewJob;
use App\Jobs\NewJob2;
use App\Jobs\SendMail_Job;
use App\Jobs\sendMailJob;
use App\Mail\sendMail;
use Illuminate\Http\Request;
use App\Models\PostModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{   
    private $post;
    public function __construct(PostModel $post)
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

        $data_posts = [$request->tieu_de,
                    $request->mo_ta_chung,
                    $request ->tac_gia,
                    now(),
                    $request->mo_ta_chi_tiet];
        $this->post->addBaiViet($data_posts);


        $id = $this->post->getIdBaiViet();
        $id_bai_viet = intval($id[0]->id_posts);
        



        for( $i = 0; $i <10;$i++)
        { 
            if($request->input("linhvuc_$i") !== null)
            {
                $data = [ $id_bai_viet,
                $request->input("linhvuc_$i"),
                $request->input("tieudenoidung_$i"),
                $request->input("urlhinhanh_$i"),
                $request->input("nguonhinhanh_$i"),
                $request->input("noi_dung_$i"),

                ];
                $this->post->addNoiDung($data);
            }else
            {
                break;
            }
            
        }

    //     $name = "Dinh Dang Nam"; 
    //     Mail::send('emails.test',compact('name'),function($email) use($name)
    // {
    //     $email->subject('TheRunDownAi');
    //     $email->to('dangnam1st@gmail.com', $name);
    // });
    

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

        
        
        $data = [$request->id,
                $request->linhvuc,
                $request->tieudenoidung,
                $request->urlhinhanh,
                $request->nguonhinhanh,
                $request->noi_dung];
       

        
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
                $request->linhvuc,
                $request->tieudenoidung,
                $request->urlhinhanh,
                $request->nguonhinhanh,
                $request->noi_dung,
                now(),
                $request->id_content];
        
        $this->post->UpdateContent($data);
        return redirect()->back();

    }

   
    

   

}