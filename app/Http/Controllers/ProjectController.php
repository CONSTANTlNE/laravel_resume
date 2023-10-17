<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SkillName;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skillname=SkillName::all();
        $projects=Project::all();

        return view('admin.resume.projects',compact('skillname','projects'));
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
        // Create a new Project instance and save it
        $project = new Project([
            'project_name' => $request->project_name,
            'code_url' => $request->code_url,
            'project_url' => $request->project_url,
        ]);
        $project->save();

        // Now you have an ID for the project, so you can sync the skills
        $project->skillNames()->sync($request->skills);

        // Add media (if using Laravel Media Library)
        $project->addMediaFromRequest('project_photo')->toMediaCollection('projects');

        return redirect()->back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
//        dd($request);
        // Define an array to hold the fields you want to update
        $fieldsToUpdate = ['project_name', 'code_url', 'project_url'];

        // Initialize an empty data array
        $data = [];

        // Iterate through the fields and add them to the data array if they exist in the request
        foreach ($fieldsToUpdate as $field) {
            if ( !empty($request->input($field))) {
                $data[$field] = $request->input($field);
            }
        }

        // Update the project with the collected data
        $project->update($data);

        // Update the skills associated with the project using the 'skills' field (many-to-many)
        if ($request->has('skills')) {
            $project->skillnames()->sync($request->input('skills'));
        }

        // Handle file upload for 'project_photo' if it exists in the request (Spatie Media Library)
        if ($request->hasFile('project_photo')) {
            // Get the current project photo media (if it exists)
            $currentPhoto = $project->getFirstMedia('projects');

            // If a current photo exists, delete it
            if ($currentPhoto) {
                $currentPhoto->delete();
            }

            // Handle file upload and store the path in media
            $project->addMediaFromRequest('project_photo')->toMediaCollection('projects');
        }

        return redirect()->back()->with('success', 'Project updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // Remove project's relations in project_skill table
        $project->skillNames()->detach();
        $project->delete();
        return redirect()->back();
    }
}
