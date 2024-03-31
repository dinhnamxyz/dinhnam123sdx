<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class PostModel extends Model
{
    use HasFactory;
    public function __construct()
    {

    }



    public function getPost()
    {   
        $data =  DB::table('Posts') 
        
        ->join('Content', 'Content.id_posts', '=', 'Posts.id_posts')
        ->join('Author' , 'Posts.id_author', '=', 'Author.id_author')
        ->select('Posts.id_posts','Posts.title', 'Posts.plus', 'Posts.create_time','Content.image_path', 'Author.author_name',)
        ->get();
        return $data;
    } 


    
    

    public function getIdBaiViet()
    {

        $id_bai = DB::table('Posts')
        ->select('Posts.id_posts')
        ->orderBy('id_posts', 'desc')
        ->limit(1)
        ->get();
        return $id_bai;
        // $id_bai = DB::select('SELECT id_bai_viet FROM bai_viet ORDER BY id_bai_viet DESC LIMIT 1');
        // return $id_bai;
    }

    

    public function getAllPost()
    {   $allPost =  DB::table('Posts') 
        
        ->join('Content', 'Content.id_posts', '=', 'Posts.id_posts')
        ->join('Author' , 'Posts.id_author', '=', 'Author.id_author')
        ->select('Posts.id_posts','Posts.title', 'Posts.plus', 'Posts.create_time','Author.author_name','Content.id_content','Content.image_path','Content.content','Content.update_time' )
        ->get();
        return $allPost;


        // $allPost = DB::select('SELECT bai_viet.id_bai_viet, bai_viet.tieu_de ,  bai_viet.mo_ta_chung, bai_viet.thoi_gian_tao_bai_viet, noi_dung_bai_viet.hinh_anh, noi_dung_bai_viet.id_noi_dung, noi_dung_bai_viet.noi_dung, noi_dung_bai_viet.thoi_gian_sua
        // FROM bai_viet
        // INNER JOIN noi_dung_bai_viet ON bai_viet.id_bai_viet = noi_dung_bai_viet.id_bai_viet Order BY bai_viet.id_bai_viet DESC');
        // return $allPost;
    }

    


    public function getBlogDetail_1($data)
    {   
        $baiviet = DB::table('Posts')
                    ->join('Author', 'Author.id_author','=', 'Posts.id_author')
                    ->select('*')
                    ->where('Posts.id_posts', [$data])
                    ->get();
        return $baiviet;


        // $baiviet = DB::select('SELECT * FROM Posts WHERE Posts.id_posts =?', [$data]);
        // return $baiviet;
    }
    public function getBlogDetail_2($data)
    {
        $noidung = DB::table('Content')
        ->select('*')
        ->where('Content.id_posts',[$data])
        ->get();
        return $noidung;


        // $noidung = DB::select('SELECT * FROM Content WHERE Content.id_posts =?', [$data]);;
        // return $noidung;
    }
   
    
    public function DeXuat()
    {
        $dexuat = DB::select('SELECT Posts.id_posts, Posts.title ,  Posts.plus, Posts.create_time, Content.image_path, Author.author_name
        FROM Posts
        INNER JOIN Author ON Posts.id_author = Author.id_author
        INNER JOIN Content ON Posts.id_posts = Content.id_posts ORDER BY Posts.create_time DESC Limit 6');
        return $dexuat;
    }

    public function QuickHit()
    {

        $quick_hit = DB::table('quick_hit')
        ->select('*')
        ->get();
         return $quick_hit;

        // $quick_hit =  DB::select('SELECT * FROM quick_hit ');
        // return $quick_hit;
    }
        
    public function getTool()
    {

        return DB::table('tools')
        ->select('*')
        ->get();
         

        // return DB::select('SELECT * FROM tools');
    }


    public function addNoiDung($data)
    {
        DB::insert('INSERT INTO Content(id_posts,license, title, image_path, image_source, content) VALUES(?,?,?,?,?,?)',$data);
    }
    public function addBaiViet($data)
    {
        DB::insert('INSERT INTO Posts(title , plus, id_author , create_time , post_describe ) VALUES(? ,? , ? ,? , ?)',$data);
    }


    public function deletePost($data)
    {
        
        DB::delete('DELETE FROM content  WHERE id_posts = ?', [$data]);
        DB::delete('DELETE FROM posts  WHERE id_posts = ?', [$data]);
    }


    public function deleteContent($data)
    {
        DB::delete('DELETE FROM content  WHERE content.id_content = ?', [$data]);
    }

    public function UpdateContent($data)
    {
        DB::update('UPDATE Content SET license =?,title=? , image_path = ?, image_source = ?, content =?, update_time =? WHERE  id_content = ?',$data);
    }


    public function getContent($id_content)
    {
        return DB::select('SELECT * FROM Content where Content.id_content = ?', [$id_content]);
    }



    public function Search($keyword)
    {
        return DB::table("Posts")
        ->join("Content", "Content.id_posts","=", "Posts.id_posts")
        ->join('Author' , 'Posts.id_author', '=', 'Author.id_author')
        ->select('Posts.id_posts','Posts.title', 'Posts.plus', 'Posts.create_time','Author.author_name','Content.image_path')
        ->where(function($query) use ($keyword)
        {
            $query->where("Posts.title", "like" ,"%$keyword%")
                    ->orWhere("Posts.plus","like", "%$keyword%");
        })
        ->get();        

        // return DB::select('SELECT bai_viet.id_bai_viet, bai_viet.tieu_de ,  bai_viet.mo_ta_chung, bai_viet.thoi_gian_tao_bai_viet, noi_dung_bai_viet.hinh_anh, bai_viet.tac_gia
        // FROM bai_viet 
        // INNER JOIN noi_dung_bai_viet ON bai_viet.id_bai_viet = noi_dung_bai_viet.id_bai_viet WHERE bai_viet.tieu_de LIKE ? ',['%' . $tukhoa. '%' ]);
        
    }



    public function countPost()
    {
        return DB::select('SELECT COUNT(id_posts) as so_bai FROM Posts');
    }
    public function countTacGia()
    {
        return DB::select('SELECT COUNT(DISTINCT id_author) as so_tac_gia FROM Posts');
    }
    public function countContent()
    {
        return DB::select('SELECT COUNT(id_content) as so_noi_dung FROM Content');
    }

}