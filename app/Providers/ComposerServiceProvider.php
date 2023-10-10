<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SkillName;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer(['index', 'admin/resume/hero_section'], function ($view) {
            $role   = Role::where('name', 'admin')->first();
            $admin  = $role->users()->first();
            $cover  = $admin->getMedia('cover');
            $hero   = HeroSection::find(1);
            $skills = Skill::all();

            if (isset($hero)) {
                $view->with('hero', $hero)->with('cover', $cover)->with('skills', $skills);
            }
        });


        view()->composer(['index', 'admin/resume/skills_section'], function ($view) {
            $role     = Role::where('name', 'admin')->first();
            $admin    = $role->users()->first();
            $skillimg = $admin->getMedia('skills');
            $skills   = Skill::get();
            if (isset($skills)) {
                $view->with('skills', $skills)->with('skillimg', $skillimg);
            }

        });


        view()->composer(['blog.layout'], function ($view) {

            $skillname   = SkillName::all();
            $projects    = Project::with('media', 'skillNames')->get();
            $permissions = Permission::all();
            $view->with(compact( 'skillname', 'projects', 'permissions'));
        });
    }


}
