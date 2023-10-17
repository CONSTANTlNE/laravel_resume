<?php

namespace App\Http\Controllers;

use App\Models\SkillName;
use Illuminate\Http\Request;

class SkillNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillnames=SkillName::all();

        return view('admin.resume.skillname',compact('skillnames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        SkillName::create([
            'skill_name'=>$request->name
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SkillName $skillName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SkillName $skillName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SkillName $skillName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillName $skill)
    {
        $skill->delete();
        return redirect()->back();
    }
}
