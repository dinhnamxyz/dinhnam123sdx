<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Author extends Model
{
    use HasFactory;
    public $table = 'author';
    protected $fillable = ['author_name'];
    
    public function posts1()
    {
        return $this->hasMany(Post::class,'id');
    }
}
