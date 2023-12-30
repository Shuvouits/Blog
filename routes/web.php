<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SystemController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//User login

Route::get('/login', [SystemController::class, 'login']);
Route::post('/login-post', [SystemController::class, 'login_post']);
Route::get('/register', [SystemController::class, 'register']);
Route::post('/register-post', [SystemController::class,'register_post']);
Route::get('/forgot-password', [SystemController::class, 'forgot_password']);
Route::post('/recover-password', [SystemController::class, 'recover_password']);
Route::get('/recover-password', [SystemController::class, 'recover_manage']);
Route::get('/test', [SystemController::class, 'test']);

//Social Login
Route::get('/auth/google', [SocialController::class,'redirectToGoogle']);
Route::get('/auth/google/callback', [SocialController::class, 'handleGoogleCallback']);

Route::get('/auth/facebook', [SocialController::class,'redirectToFacebook']);
Route::get('/auth/facebook/callback', [SocialController::class, 'handleFacebookCallback']);





//Admin Route
Route::group(['middleware' => ['CustomAuth']], function(){
   // Route::get('admin/dashboard', function(){
     //   return view('admin.Index');
   // });
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/category',[AdminController::class,'category']);
    Route::get('/admin/author', [AdminController::class, 'author']);
    Route::get('/admin/add-category',[AdminController::class,'add_category']);
    Route::get('/admin/add-author',[AdminController::class,'add_author']);
    Route::post('/admin/create-category', [AdminController::class, 'create_category']);
    Route::post('/admin/create-author', [AdminController::class, 'create_author']);
    Route::get('/admin/edit-category/{id}', [AdminController::class, 'edit_category']);
    Route::get('/admin/edit-author/{id}', [AdminController::class, 'edit_author']);
    Route::post('/admin/edit-category', [AdminController::class, 'post_edit_category']);
    Route::post('/admin/edit-author', [AdminController::class, 'post_edit_author']);
    Route::get('/admin/delete-category/{id}', [AdminController::class, 'delete_category']);
    Route::get('/admin/delete-author/{id}', [AdminController::class, 'delete_author']);
    Route::get('/admin/tag', [AdminController::class, 'tag']);
    Route::get('/admin/add-tag', [AdminController::class, 'add_tag']);
    Route::post('/admin/create-tag', [AdminController::class,'create_tag']);
    Route::get('/admin/edit-tag/{id}', [AdminController::class, 'edit_tag']);
    Route::post('/admin/edit-tag',[AdminController::class, 'post_edit_tag']);
    Route::get('/admin/delete-tag/{id}',[AdminController::class, 'delete_tag']);
    Route::get('/admin/post',[AdminController::class, 'post']);
    Route::get('/admin/add-post', [AdminController::class, 'add_post']);
    Route::post('/admin/create-post', [AdminController::class, 'create_post']);
    Route::get('/admin/edit-post/{id}', [AdminController::class, 'edit_post']);
    Route::post('/admin/edit-post', [AdminController::class, 'edit_post_data']);
    Route::get('/admin/delete-post/{id}', [AdminController::class, 'delete_post']);
    Route::get('/admin/view-post/{id}', [AdminController::class, 'view_post']);
    Route::get('/admin/newsletter', [AdminController::class, 'newsletter']);
    Route::get('/admin/delete-newsletter/{id}', [AdminController::class, 'delete_newsletter']);
    Route::get('/admin/send-mail', [AdminController::class, 'send_mail']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
    Route::get('/admin/profile', [AdminController::class, 'profile']);
    Route::post('/admin/profile-post', [AdminController::class, 'profile_post']);
    Route::post('/admin/change-password', [AdminController::class, 'change_password']);
    Route::post('/admin/profile-change', [AdminController::class, 'profile_change']);
    Route::get('/admin/inbox', [AdminController::class, 'inbox']);
    Route::get('/admin/compose', [AdminController::class, 'compose']);
    Route::post('/admin/inbox/delete-data', [AdminController::class, 'inbox_delete']);
    Route::get('/admin/read-mail/{id}', [AdminController::class, 'read_mail']);
    Route::get('/admin/sent', [AdminController::class, 'inbox_sent']);

});




//Frontend Route
Route::get('/', [FrontendController::class,'index']);
Route::get('/category/{cat_name}/', [FrontendController::class,'category']);
Route::get('/about/', [FrontendController::class, 'about']);
Route::get('/contact/', [FrontendController::class, 'contact']);
Route::post('/newsletter/', [FrontendController::class, 'newsletter']);
Route::post('/contact-details/', [FrontendController::class, 'contact_details']);
Route::get('/search-post/', [FrontendController::class, 'search_post']);
Route::get('/{post_url}/', [FrontendController::class,'post_url']);
