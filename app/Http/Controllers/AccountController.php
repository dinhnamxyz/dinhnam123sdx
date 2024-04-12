<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

class AccountController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
   
    // 
    // 
    private $users;
    public function __construct()
    {
        $this->users = new User();
        $this->middleware('guest')->except('logout');
        
    }
    // hiển thị form đăng kí
    public function hien_thi_dk(){
        return view('DangKi');
    }


    // post form đăng kí
    public function post_dk(Request $request)
    {
        
        $request ->validate([
            'user_name' => 'required|min:6 |unique:users,account_name',
            'pass' => 'min:6|regex:/^\S*$/',
            'pass_cf' => 'min:6|regex:/^\S*$/|same:pass',
            'email' => 'required|email|unique:users,email',

        ],[
            'required' => ':attribute không được để trống',
            'min' => ':attribute quá ngắn',
            'email'=> ':attribute chưa đúng định dạng email',
            'regex:/^\S*$/' => ':attribute chứa khoảng trắng',
            'unique' => ':attribute đã tồn tại',
            'same' =>'Xác nhận lại mật khẩu'
        ]);

        

        $data  = [
            'account_name'=>$request->user_name,
            'password'=>bcrypt($request->pass),
            'email'=>$request->email
            
        ];

        
        User::create($data);
        
        return redirect()->route('taikhoan.dangnhap');

    }


    public function getDangNhap()
    {
        return view('DangNhap');
    }

    public function checkLogin(Request $request)
    {
        $request ->validate([
            'user_name' =>'required|min:6',
            'pass'  =>'required'

        ],[
            'user_name.required' =>'Tên tài khoản không rỗng',
            'user_name.min' =>'Tên tài khoản không hợp lệ',
            'pass.required' =>'Không để trống mật khẩu',
            
        ]);

        // $data = [
        //     $request->user_name,
        //     $request->pass
        // ];
        
        // $this->users->checkUser($data);
        
        // if(!empty($this->users->checkUser($data)))
        // {
        //     // return Redirect::action('App\Http\Controllers\PostController@showPost');
        //     return redirect()->route('TrangChu');
        // }else
        // {
        //     return 'Thất bại';
        // }
        if(Auth::attempt(['account_name'=>$request->user_name,'password'=>$request->pass]))
        {   
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            $request->session()->regenerate();

                return redirect()->route('TrangChu');
        }else
        {
                return"thatbai";
        }
    }


}
