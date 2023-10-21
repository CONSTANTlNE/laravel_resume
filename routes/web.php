<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillNameController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Localization;
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

Route::get('/test', function () {
    $slug = Str::slug('ქართული','_'); // Generate a slug from the string

    return view('test')->with('slug', $slug); // Pass the slug variable to the 'test' view
});

// Choose Language
Route::post( '/lang', [LocaleController::class, 'setLocale'])->name('set-locale');

// No Permissions with language middleware
Route::middleware([Localization::class])
    ->prefix('{locale?}')
    ->group(function () {
        Route::get( '/', [ProfilePageController::class, 'index'])->name('home');
        Route::controller(ArticleController::class)->group(function () {
            Route::get('/blog', 'index')->name('blog');
            Route::get('/category/{category}', 'categories')->name('show_category');
            Route::get('/article/show/{article?}', 'show')->name('show_article');
            Route::get('/search', 'index')->name('search');
            Route::get('/user/{user}', 'users')->name('article_user');
        });
    });



// Views for Only Admin and Contributor
Route::middleware(['auth', 'role:admin|contributor', 'localization'])->prefix('admin')
    ->prefix('{locale?}')
    ->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/articles', [AdminController::class, 'articles'])->name('article_list');

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
    Route::controller(ProjectController::class)
        ->group(function () {
            Route::get('/projects', 'index')->name('projects');
            Route::post('/projects/add', 'store')->name('add_project');
            Route::post('/projects/delete/{project}', 'destroy')->name('delete_project');
            Route::put('/projects/update/{project}', 'update')->name('update_project');
        });

    //Articles
    Route::controller(ArticleController::class)->group(function () {
            Route::get('/restore/{article}','restoreArticle')->name('restore_article');
            Route::post('/permanent_delete/{article}','deleteArticle')->name('permanent_delete');
            Route::get('/edit/{article}','edit' )->name('edit_article');
            Route::get('/create','create')->name('create_article');
            Route::post('/store','store')->name('store_article');
            Route::put('/update/{article}' ,'update')->name('update_article');
            Route::post('/delete/{article}','destroy' )->name('delete_article');
            Route::get('/deleted','deleted' )->name('deleted_articles');
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

