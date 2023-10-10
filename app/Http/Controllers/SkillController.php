<?php

namespace App\Http\Controllers;


use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Skill::all();

        return view('admin.resume.skills_section', compact('data'));
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
        $data=([
            'experience'    => $request->experience,
            'skill_icon'        => $request->skill_icon,

        ]);


        Skill::insert($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Skill $skill)
    {

        $data = request()->all();
        $skill->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {


        $skill->delete();
        return redirect()->back();
    }
}
