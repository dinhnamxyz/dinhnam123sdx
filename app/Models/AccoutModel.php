<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class AccoutModel extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $table ='users';
    public function __construct()
    {
        
    }


    public function addUser($data)
    {
        DB::insert('INSERT INTO users (account_name , password , email, create_time) VALUES (? , ?, ?, ?)' , $data);
    }

    public function checkUser($data)
    {
        $id_tk = DB::select('SELECT id_user FROM users WHERE account_name =? AND password =?', $data);
        return $id_tk;
    }
}
