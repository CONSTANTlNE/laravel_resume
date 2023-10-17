<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfilePageController;
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

// No Permissions
Route::controller(ArticleController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog');
    Route::get('/category/{category}', 'index')->name('show_category');
    Route::get('/article/show/{article:slug}', 'show')->name('show_article');
    Route::get('/search', 'index')->name('search');
});


Route::get('/', [ProfilePageController::class, 'index'])->name('home');


// Views for Only Admin and Contributor
Route::middleware(['auth', 'role:admin|contributor'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/users', [AdminController::class, 'users'])->name('users');

    //Blog Roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::post('/roles/add', [RoleController::class, 'store'])->name('add_roles');
    Route::put('/roles/update/{role}', [RoleController::class, 'update'])->name('edit_roles');
    Route::post('/roles/delete/{role}', [RoleController::class, 'destroy'])->name('delete_roles');

    //Blog Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');

    //Resume Hero Section
    Route::get('/hero', [HeroSectionController::class, 'index'])->name('hero');
    Route::put('/hero/update', [HeroSectionController::class, 'update'])->name('hero_update');

    // Resume My Skills
    Route::get('/my_skills', [SkillController::class, 'index'])->name('my_skills');
    Route::post('/my_skills/add', [SkillController::class, 'store'])->name('add_skill');
    Route::post('/my_skills/delete/{skill}', [SkillController::class, 'destroy'])->name('delete_skill');
    Route::put('/my_skills/update/{skill}', [SkillController::class, 'update'])->name('update_skill');

    // Resume Skill Names
    Route::get('/skills', [SkillNameController::class, 'index'])->name('skills');
    Route::post('/skills/delete_skillname/{skill}', [SkillNameController::class, 'destroy'])->name('delete_skillname');
    Route::post('/skills/add_skill', [SkillNameController::class, 'store'])->name('add_skillname');


    // Resume Projects
    Route::prefix('projects')
        ->controller(ProjectController::class)
        ->group(function () {
            Route::get('/projects', 'index')->name('projects');
            Route::post('/projects/add', 'store')->name('add_project');
            Route::post('/projects/delete/{project}', 'destroy')->name('delete_project');
            Route::put('/projects/update/{project}', 'update')->name('update_project');
        });

    //Articles
    Route::prefix('articles')
        ->controller(ArticleController::class)
        ->group(function () {
            Route::get('list', 'index')->name('article_list');
            Route::get('/edit/{article}', 'edit')->name('edit_article');
            Route::get('/create', 'create')->name('create_article');
            Route::post('/store', 'store')->name('store_article');
            Route::put('/update/{article}', 'update')->name('update_article');
            Route::post('/delete/{article}', 'destroy')->name('delete_article');
        });

});


// User Profile
Route::middleware(['auth'])
    ->prefix('profile')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('show', 'index')->name('profile');
        Route::get('edit', 'edit')->name('edit_profile');
        Route::put('update/{user}', 'update')->name('update_profile');
        Route::put('update/{user}/password', 'password')->name('update_password');
    });


// Likes & Follow (user must be authenticated to give like or follow)
Route::middleware(['auth'])->group(function () {
    Route::post('/article/like', [LikeController::class, 'like'])->name('like');
    Route::post('/user/follow', [FollowController::class, 'follow'])->name('follow');

});



