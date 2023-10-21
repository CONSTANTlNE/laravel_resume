<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class ProfilePageController extends Controller
{
    public function index (){
            $role   = Role::where('name', 'admin')->first();
            $admin  = $role->users()->first();
            $cover  = $admin->getMedia('cover');
            $hero   = HeroSection::find(1);
            $skills = Skill::all();
            $projects=Project::with('media','skillNames')->get();

        return view ('index', compact('cover','skills','hero','projects'));
    }
}
