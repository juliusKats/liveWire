<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
  public function index(){
    $roles =Role::all();
      return view("RolesPermission.Roles.index",compact('roles'));
  }

  public function store(Request $request){
      $validated=$request->validate([
          'name'=>['required','min:3','string','unique:roles,name'
              ]
      ]);
      // dd($request->role);
      Role::create($validated);
      return redirect('Roles/index')->with('status',"{$request->name} successfully created");

  }

  public function edit($id){
    // edit(Permission $perms)
    $role=Role::find($id);
      return view("RolesPermission.Roles.edit",compact('role'));
  }
  public function update (Request $request,$id){
         $role = Role::find($id);
         $validate_data = $request->validate([
           'role'=>['required','min:3','string','unique:roles,name'],
         ]);
         $role->update(['name'=>$request->role]);
         return redirect('Roles/index')->with('status',"{$request->name} successfully updated");

       }
  public function delete($id){
           $role = Role::find($id);
           $role->delete();
           return redirect('Roles/index')->with('status',"{$request->name} successfully deleted");

       }

       public function AddPermissionToRole($id){
         $role=Role::find($id);
         $permissions = Permission::get();
          $rolePermissions=DB::table('role_has_permissions')->where('role_has_permissions.role_id',$role->id)
          ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
         return view("RolesPermission.Roles.AddPermissionRole",compact('role','permissions','rolePermissions'));
         // dd($rolePermissions);
       }
       public function storeRolePermission(Request $request,$id){
         $request->validate([
           'permissions'=>['required']
         ]);
         $role = Role::find($id);
         $role->syncPermissions($request->permissions);
         // dd($request->permissions);
         return redirect()->back()->with('status',"Permission assigned to Role $role->name successfully");
       }


}
