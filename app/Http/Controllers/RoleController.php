<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::with('permissions')->get();

        return view('admin.admin_pages.roles',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $roleName=$request->name;
        $role=Role::create(['name'=>$roleName]);
        $role->syncPermissions($request->permission);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $fieldsToUpdate = ['name'];
        $data = [];

        foreach ($fieldsToUpdate as $field) {
            if ( !empty($request->input($field))) {
                $data[$field] = $request->input($field);
            }
        }

        $role->update($data);

        if ($request->has('permission')) {
            $role->syncPermissions($request->permission);
        }
  return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
          $role->delete();
          return redirect()->back();
    }
}
