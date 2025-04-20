<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function index(){
      $perms =Permission::all();
        return view("RolesPermission.Permissions.index",compact('perms'));
    }

    public function store(Request $request){
        $request->validate([
            'permission'=>[
                'required',
                'min:3',
                'string',
                'unique:permissions,name'
                ]
        ]);
        Permission::create([
            'name'=>$request->permission
        ]);
        return redirect('Permissions/index')->with('status',"{$request->permission} successfully created");
    }

    public function edit($id){
      // edit(Permission $perms)
      $perm=Permission::find($id);
        return view("RolesPermission.Permissions.edit",compact('perm'));
    }
    public function update (Request $request,$id){
           $permission = Permission::find($id);
           $validate_data = $request->validate([
             'perms'=>['required','min:3','string','unique:permissions,name'],
           ]);
           $permission->update(['name'=>$request->perms]);
           return redirect('Permissions/index')->with('status',"{$request->perms} successfully updated");

         }
    public function delete($id){
             $permission = Permission::find($id);
             $permission->delete();
             return redirect('Permissions/index')->with('status',"Permission successfully deleted");

         }

    public function creates(){
        return view("Layout.Auth.register");
    }
    public function create(){
        return ("i am index");
    }








}
