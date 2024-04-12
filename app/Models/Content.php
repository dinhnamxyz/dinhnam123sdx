<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;


class Content extends Model
{
    use HasFactory;
    public $table = 'contents';
    protected $fillable =
    ['id_posts', 'license', 'title', 'image_path', 'image_source', 'content'];
    public function posts()
    {
        return $this->belongsTo(Post::class,'id_posts');
    }

    

    
}
