<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ProperyType;

class UserController extends Controller
{
    public function index()
    {
        $properties = Property::with('user')->get();
        $property_type = ProperyType::latest()->limit(5)->get();
        $property1 = Property::where('status', '1')->where('featured', '1')->limit(3)->get();
        return view('welcome', compact('property_type', 'property1'));
    }
    public function UserProfile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend/dashboard/userprofile', compact('userData'));
    }
    public function UserProfileStore(Request $request)
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
            @unlink(public_path('upload/user_images/' . $data->photo)); //remove these photo[for replace photo from file explorer]
            $filename = date('YmdHi') . $file->getClientOriginalName(); //eg 5666.p1.png image with particular id
            $file->move(public_path('upload/user_images'), $filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'User login Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function UserLogout(Request $request) //backend template logout button work
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User logout successfully',
            'alert-type' => 'success'
        );
        return redirect('/login')->with($notification);
    } //end method

    public function UserChangePassword()
    {
        $id = Auth::user()->id; //login person can access
        $profileData = User::find($id);
        return view('frontend.dashboard.change_password', compact('profileData'));
    } //end
    public function UserPasswordUpdate(Request  $request)
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
}
