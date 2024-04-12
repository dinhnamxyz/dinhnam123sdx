<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Content;
use App\Models\Author;


class Post extends Model
{
    use HasFactory;
    public $table = 'posts';
    protected $fillable = ['title', 'plus', 'author_id', 'post_describe'];

    public function contents()
    {
        return $this->hasMany(Content::class, 'id');
    }
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }


    public function getPost()
    {
        // $data =  DB::table('posts') 
        // ->join('contents', 'contents.id_posts', '=', 'posts.id')
        // ->join('author' , 'posts.author_id', '=', 'author.id')
        // ->select('posts.id','posts.title', 'posts.plus', 'posts.created_at','contents.image_path', 'author.author_name',)
        // ->get();

        $data = Post::with('contents', 'author')->get();
        return $data;
    }

    public function getIdBaiViet()
    {

        // $id_bai = DB::table('posts')
        // ->select('posts.id')
        // ->orderBy('id', 'desc')
        // ->limit(1)
        // ->get();

        $id_bai = Post::select('posts.id')
            ->orderBy('id', 'desc')
            ->first();

        return $id_bai;

        // $id_bai = DB::select('SELECT id_bai_viet FROM bai_viet ORDER BY id_bai_viet DESC LIMIT 1');
        // return $id_bai;
    }



    public function getAllPost()
    {
        // $allPost =  DB::table('posts') 
        // ->join('contents', 'contents.id_posts', '=', 'posts.id')
        // ->join('author' , 'posts.author_id', '=', 'author.id')
        // ->select('posts.id','posts.title', 'posts.plus', 'posts.created_at','author.author_name','contents.id as id_content','contents.image_path','contents.content','contents.updated_at' )
        // ->get();

        $allPost = Post::with('contents', 'author')->get();
        return $allPost;

        // $allPost = DB::select('SELECT bai_viet.id_bai_viet, bai_viet.tieu_de ,  bai_viet.mo_ta_chung, bai_viet.thoi_gian_tao_bai_viet, noi_dung_bai_viet.hinh_anh, noi_dung_bai_viet.id_noi_dung, noi_dung_bai_viet.noi_dung, noi_dung_bai_viet.thoi_gian_sua
        // FROM bai_viet
        // INNER JOIN noi_dung_bai_viet ON bai_viet.id_bai_viet = noi_dung_bai_viet.id_bai_viet Order BY bai_viet.id_bai_viet DESC');
        // return $allPost;
    }




    public function getBlogDetail_1($data)
    {
        // $baiviet = DB::table('posts')
        //     ->join('author', 'author.id', '=', 'posts.author_id')
        //     ->select('*')
        //     ->where('posts.id', [$data])
        //     ->get();
        // return $baiviet;

        $baiviet = Post::with('author')->where('id', [$data])->get();
        return $baiviet;
        // $baiviet = DB::select('SELECT * FROM Posts WHERE Posts.id_posts =?', [$data]);
        // return $baiviet;
    }
    public function getBlogDetail_2($data)
    {
        // $noidung = DB::table('contents')
        //     ->select('*')
        //     ->where('contents.id_posts', [$data])
        //     ->get();
        // return $noidung;

        $noidung = Content::with('posts')
            ->where('id_posts', [$data])
            ->get();
        return $noidung;
        // $noidung = DB::select('SELECT * FROM Content WHERE Content.id_posts =?', [$data]);;
        // return $noidung;
    }


    public function DeXuat()
    {
        
        // $dexuat = DB::table('posts')
        //     ->join('author', 'author.id', '=', 'posts.author_id')
        //     ->join('contents', 'contents.id_posts', '=', 'posts.id')
        //     ->select('posts.id', 'posts.title', 'posts.plus', 'posts.created_at', 'contents.image_path', 'author.author_name')
        //     ->orderBy('posts.created_at', 'DESC')
        //     ->limit(6)
        //     ->get();
        // return $dexuat;

        $dexuat = Post::with('contents', 'author')
            ->orderBy('created_at')
            ->limit(6)
            ->get();
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
        Content::insert($data);
        // DB::insert('INSERT INTO content(id_posts,license, title, image_path, image_source, content) VALUES(?,?,?,?,?,?)',$data);
    }
    public function addBaiViet($data)
    {
        Post::insert($data);
        // DB::insert('INSERT INTO posts(title , plus, id_author , create_time , post_describe ) VALUES(? ,? , ? ,? , ?)',$data);
    }


    public function deletePost($data)
    {
        // DB::delete('DELETE FROM contents  WHERE id_posts = ?', [$data]);
        // DB::delete('DELETE FROM posts  WHERE id = ?', [$data]);
        Content::where('id_posts', '=', [$data])->delete();
        Post::where('id', '=', [$data])->delete();
    }

    public function deleteContent($data)
    {
        // DB::delete('DELETE FROM contents  WHERE contents.id = ?', [$data]);
        Content::where('id', '=', [$data])->delete();
    }

    public function UpdateContent($data, $id)
    {
        Content::where('id', $id)
            ->update($data);

        // DB::update('UPDATE contents SET license =?,title=? , image_path = ?, image_source = ?, content =?, updated_at =? WHERE  id = ?',$data);
    }
    public function getContent($id_content)
    {
        // return DB::select('SELECT * FROM contents where contents.id = ?', [$id_content]);


        return Post::where('id', $id_content)->get();
    }

    public function Search($keyword)
    {
        // return DB::table("posts")
        //     ->join("contents", "contents.id_posts", "=", "posts.id")
        //     ->join('author', 'posts.author_id', '=', 'author.id')
        //     ->select('posts.id', 'posts.title', 'posts.plus', 'posts.created_at', 'author.author_name', 'contents.image_path')
        //     ->where(function ($query) use ($keyword) {
        //         $query->where("posts.title", "like", "%$keyword%")
        //             ->orWhere("posts.plus", "like", "%$keyword%");
        //     })
        //     ->get();

        return Post::with('contents', 'author')
            ->where(function ($query) use ($keyword) {
                $query->where("posts.title", "like", "%$keyword%")
                    ->orWhere("posts.plus", "like", "%$keyword%");
            })
            ->get();

        // return DB::select('SELECT bai_viet.id_bai_viet, bai_viet.tieu_de ,  bai_viet.mo_ta_chung, bai_viet.thoi_gian_tao_bai_viet, noi_dung_bai_viet.hinh_anh, bai_viet.tac_gia
        // FROM bai_viet 
        // INNER JOIN noi_dung_bai_viet ON bai_viet.id_bai_viet = noi_dung_bai_viet.id_bai_viet WHERE bai_viet.tieu_de LIKE ? ',['%' . $tukhoa. '%' ]);

    }



    public function countPost()
    {
        return DB::select('SELECT COUNT(id) as so_bai FROM posts');
    }
    public function countTacGia()
    {
        return DB::select('SELECT COUNT(DISTINCT author_id) as so_tac_gia FROM posts');
    }
    public function countContent()
    {
        return DB::select('SELECT COUNT(id) as so_noi_dung FROM contents');
    }
}
