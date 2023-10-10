<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillNameController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    if(auth()->user()){
        $user=auth()->user();
        if($user->hasRole(['admin','contributor'])){
            return redirect()->route('admin');
        }
    }
    return view('index');
})->name('home');




Route::middleware(['auth','role:admin|contributor'])->prefix('admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin');
    Route::get('/users',[AdminController::class,'users'])->name('users');
    //Roles
    Route::get('/roles',[RoleController::class,'index'])->name('roles');
    Route::post('/roles/add',[RoleController::class,'store'])->name('add_roles');
    Route::put('/roles/update/{role}',[RoleController::class,'update'])->name('edit_roles');
    Route::post('/roles/delete/{role}',[RoleController::class,'destroy'])->name('delete_roles');
    //Permissions
    Route::get('/permissions',[PermissionController::class,'index'])->name('permissions');
    Route::post('/permissions/store',[PermissionController::class,'store'])->name('permissions.store');
   //Hero Section
    Route::get('/hero',[HeroSectionController::class,'index'])->name('hero');
    Route::put('/hero/update',[HeroSectionController::class,'update'])->name('hero_update');
    // My Skills
    Route::get('/my_skills',[SkillController::class,'index'])->name('my_skills');
    Route::post('/my_skills/add',[SkillController::class,'store'])->name('add_skill');
    Route::post('/my_skills/delete/{skill}',[SkillController::class,'destroy'])->name('delete_skill');
    Route::put('/my_skills/update/{skill}',[SkillController::class,'update'])->name('update_skill');
    // Skill Names
    Route::get('/skills',[SkillNameController::class,'index'])->name('skills');
    Route::post('/skills/delete_skillname/{skill}',[SkillNameController::class,'destroy'])->name('delete_skillname');
    Route::post('/skills/add_skill',[SkillNameController::class,'store'])->name('add_skillname');
    // Projects
    Route::get('/projects',[ProjectController::class,'index'])->name('projects');
    Route::post('/projects/add',[ProjectController::class,'store'])->name('add_project');
    Route::post('/projects/delete/{project}',[ProjectController::class,'destroy'])->name('delete_project');
    Route::put('/projects/update/{project}',[ProjectController::class,'update'])->name('update_project');

    //Articles
    Route::get('/articles',[ArticleController::class,'index'])->name('article_list');
    Route::get('/article/edit/{article}',[ArticleController::class,'edit'])->name('edit_article');
    Route::get('/article/create',[ArticleController::class,'create'])->name('create_article');
    Route::post('/article/store',[ArticleController::class,'store'])->name('store_article');
    Route::put('/article/update/{article}',[ArticleController::class,'update'])->name('update_article');
    Route::post('/article/delete/{article}',[ArticleController::class,'destroy'])->name('delete_article');
    //Categories
});

// Likes
Route::middleware(['auth'])->group(function(){
    Route::post('/article/like',[LikeController::class,'like'])->name('like');
    Route::post('/user/follow',[FollowController::class,'follow'])->name('follow');
    Route::get('/admin/profile',[UserController::class,'index'])->name('profile');

});


// No Permissions
Route::get('/blog',[ArticleController::class,'index'])->name('blog');
Route::get('/category/{category}',[ArticleController::class,'index'])->name('show_category');
Route::get('/article/show/{article}',[ArticleController::class,'show'])->name('show_article');
Route::post('/search',[CategoryController::class,'show'])->name('search');


Route::get('/follow',[FollowController::class,'show'])->name('show');
