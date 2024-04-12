<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\PostController;
use App\Models\AccoutModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/









// Đăng kí route cho đăng kí, đăng nhập
Route::prefix('accounts')->name('taikhoan.')->group(function()
{
    Route::get('/sign-up', [AccountController::class , 'hien_thi_dk'])->name('dangki');
    Route::post('/sign-up', [AccountController::class, 'post_dk'])->name('postDK');


    Route::get('/login', [AccountController::class, 'getDangNhap'])->name('dangnhap');
    Route::post('/login', [AccountController::class, 'checkLogin'])->name('postDN');

});

Route::middleware(['auth.user'])->group( function(){
    Route::get('/',[PostController::class, 'showPost'])->name('TrangChu');
    Route::get('/archive',[PostController::class,'searchPosts'])->name('searchPosts');

});
Route::prefix('/posts')->name('baiviet.') ->group(function()
{       
        Route::get('/id-post = {id}',[PostController::class, 'BlogDetail'])->name('ChiTietBaiViet');

        Route::get('/',[PostController::class,'danhSachBaiViet'])->name('dashboard');
        
        Route::get('/post-detail',[PostController::class,'postDetail'])->name('DanhSachBaiViet');
      



        Route::get('/create-posts',[PostController::class, 'Them_bai_viet'])->name('getThem_bai_viet');
        Route::post('/create-posts',[PostController::class, 'postThem_bai_viet'])->name('postThem_bai_viet');



        Route::get('/create-content/id_post = {id}/id_content = {id_content}',[PostController::class, 'themND'])->name('getTao_noi_dung');
        Route::post('/create-content/id_post = {id}/id_content = {id_content}',[PostController::class, 'postThemND'])->name('postTao_noi_dung');


        

        Route::get('/content-detail/id_posts = {id}/id_content={id_content}',[PostController::class, 'getUpdate'])->name('gUpdate');
        Route::put('/contetn-detail/id_posts = {id}/id_content={id_content}',[PostController::class, 'postUpdate'])->name('Update');



        Route::get('/delete-posts',[PostController::class, 'xoaBaiViet'])->name('xoaBaiViet');
        Route::get('/delete-content',[PostController::class, 'deleteContent'])->name('xoaNoiDung');


        
        // Route::get('/test-queue',[PostController::class, 'testQueue'])->name('testQueue');
        

        
});
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
