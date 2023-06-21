<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        return redirect('admin/login');
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
            @unlink(public_path('upload/admin_images/'.$data->photo));//remove these photo[for replace photo from file explorer]
            $filename = date('YmdHi') . $file->getClientOriginalName(); //eg 5666.p1.png image with particular id
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification=array(
            'message'=>'Admin login Updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
    public function AdminChangePassword()
    {
        $id = Auth::user()->id; //login person can access
        $profileData = User::find($id); 
        return view('admin/admin_change_password',compact('profileData'));
    }//end
    public function AdminUpdatePassword(Request  $request)
    {
        //validation code
        $request->validate(
            [
                'old_password'=>'required',
                'new_password'=>'required |confirmed'
            ]
            );
            //match old password
            if(!Hash::check($request->old_password,auth::user()->password))
            {
                $notification=array(
                    'message'=>'Old password does not match',
                    'alert-type'=>'success'
                );
                return back()->with($notification);
            }///end math

            //update new password
User::whereId(auth()->user()->id)->update(
    ['password'=>Hash::make($request->new_password)
]);
    $notification=array(
        'message'=>'password change successfully',
        'alert-type'=>'success'
    );
    return back()->with($notification);
}

       
    
}
