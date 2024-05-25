<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use App\Models\User;
use DB;

class RoleController extends Controller
{
    public function AllPermission()
    {
        $permissions = Permission::all();
        return view('backend.pages.permission.all_permission', compact('permissions'));
    }
    //End Method
    public function AddPermission()
    {
        return view('backend.pages.permission.add_permission');
    }
    public function StorePermission(Request $request)
    {

        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    } // End Method
    public function EditPermission($id)
    {
        $permission  = Permission::find($id);
        return view('backend.pages.permission.edit_permission', compact('permission'));
    }
    public function UpdatePermission(Request $request)
    {
        $id = $request->id;
        Permission::find($id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permission')->with($notification);
    }
    public function DeletePermission($id)
    {
        Permission::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //permission method end
    public function ImportPermission()
    {

        return view('backend.pages.permission.import_permission');
    } // End Method 
    public function Export()
    {

        return Excel::download(new PermissionExport, 'permission.xlsx');
    } // End Method 
    public function Import(Request $request)
    {
        Excel::import(new PermissionImport, $request->file('import_file'));
        $notification = array(
            'message' => 'Permission Imported Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    //import export method end

    public function AllRoles()
    {
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    }
    //End Method
    public function AddRoles()
    {
        return view('backend.pages.roles.add_roles');
    }
    public function StoreRoles(Request $request)
    {

        $roles = Role::create([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Roles Create Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    } // End Method
    public function EditRoles($id)
    {
        $roles  = Role::find($id);
        return view('backend.pages.roles.edit_roles', compact('roles'));
    }
    public function UpdateRoles(Request $request)
    {
        $id = $request->id;
        Role::find($id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Roles Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }
    public function DeleteRoles($id)
    {
        Role::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Roles Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } //end roles method

    public function AddRolesPermission()
    {

        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backend.pages.rolesetup.add_roles_permission', compact('permission_groups', 'roles', 'permissions'));
    }
    public function RolePermissionStore(Request $request)
    {
        $data = array();
        $permissions = $request->permission;
        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;
            DB::table('role_has_permissions')->insert($data);
        } //end foreach
        $notification = array(
            'message' => 'Roles Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }
    public function AllRolesPermission()
    {

        $roles = Role::all();
        return view('backend.pages.rolesetup.all_roles_permission', compact('roles'));
    } // End Method 
    public function AdminEditRoles($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('backend.pages.rolesetup.edit_roles_permission', compact('role', 'permissions', 'permission_groups'));
    }
    public function AdminRolesUpdate(Request $request, $id)
    { //chatgpt code
        $request->validate([
            'permission' => 'array|required',
            'permission.*' => 'integer|exists:permissions,id',
        ]);
        $role = Role::findOrFail($id);
        $permissionIds = $request->permission;

        if (!empty($permissionIds)) {
            // Fetch permission names using the provided IDs
            $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();

            if (!empty($permissions)) {
                $role->syncPermissions($permissions);
            } else {
                // Handle the case where no valid permissions are found
                return redirect()->back()->withErrors(['No valid permissions found.']);
            }
        } else {
            // Handle the case where no permissions are provided
            return redirect()->back()->withErrors(['No permissions provided.']);
        }


        /* $role = Role::findOrFail($id);
        $permissions = $request->permission;
        // dd($permissions);
        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }realstate code give error*/

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles.permission')->with($notification);
    } // End Method 
    public function AdminDeleteRoles($id)
    {

        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

}
