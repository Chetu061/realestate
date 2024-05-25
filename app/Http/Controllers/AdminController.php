<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }
    //end method

    public function AdminLogout(Request $request) //backend template logout button work
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'Admin logout successfully',
            'alert-type' => 'success'
        );

        return redirect('admin/login')->with($notification);
    } //end method
    public function AdminLogin()
    {

        return view('admin.login');
    } //end method
    public function AdminProfile()
    {

        $id = Auth::user()->id; //login person can access
        $profileData = User::find($id); //get data from users table from id
        return view('admin.admin_profile_view', compact('profileData'));
    } //end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id; //login person can access
        $data = User::find($id); //get data from users table from id
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo)); //remove these photo[for replace photo from file explorer]
            $filename = date('YmdHi') . $file->getClientOriginalName(); //eg 5666.p1.png image with particular id
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin login Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function AdminChangePassword()
    {
        $id = Auth::user()->id; //login person can access
        $profileData = User::find($id);
        return view('admin/admin_change_password', compact('profileData'));
    } //end
    public function AdminUpdatePassword(Request  $request)
    {
        //validation code
        $request->validate(
            [
                'old_password' => 'required',
                'new_password' => 'required |confirmed'
            ]
        );
        //match old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old password does not match',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } ///end math

        //update new password
        User::whereId(auth()->user()->id)->update(
            [
                'password' => Hash::make($request->new_password)
            ]
        );
        $notification = array(
            'message' => 'password change successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
    // Agent user All method
    public function AllAgent()
    {

        $allagent = User::where('role', 'agent')->get();
        return view('backend.agentuser.all_agent', compact('allagent'));
    } // End Method

    public function AddAgent()
    {

        return view('backend.agentuser.add_agent');
    } // End Method 


    public function StoreAgent(Request $request)
    {

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'agent',
            'status' => 'active',
        ]);


        $notification = array(
            'message' => 'Agent Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.agent')->with($notification);
    } // End Method
    public function EditAgent($id)
    {
        $agent = User::FindorFail($id);
        return view('backend.agentuser.edit_agent', compact('agent'));
    }
    public function UpdateAgent(Request $request)
    {
        $pid = $request->id;
        User::findOrFail($pid)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $notification = array(
            'message' => 'Agent Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.agent')->with($notification);
    }
    public function DeleteAgent($id)
    {
        User::findOrfail($id)->delete();
        $notification = array(
            'message' => 'Agent Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function changeStatus(Request $request)
    {

        $user = User::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status Change Successfully']);
    } // End Method
    //admin info
    public function AllAdmin()
    {

        $alladmin = User::where('role', 'admin')->get();
        return view('backend.pages.admin.all_admin', compact('alladmin'));
    } // End Method 
    public function AddAdmin()
    {

        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));
    } // End Method 

    public function StoreAdmin(Request $request)
    {

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password =  Hash::make($request->password);
        $user->role = 'admin';
        $user->status = 'active';
        $user->save();
        // dd($request);

        if ($request->roles) {
            $user->assignRole($request->roles);
        }


        $notification = array(
            'message' => 'New Admin User Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End Method 




}
