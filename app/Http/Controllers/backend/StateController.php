<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function AllState()
    {
        $state = State::latest()->get();
        // dd($state);
        return view('backend.state.all_state', compact('state'));
    } //End Method
    public function AddState()
    {
        return view('backend.state.add_state');
    } //end method
    public function StoreState(Request $request)
    {

        $image = $request->file('state_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 275)->save('upload/state/' . $name_gen);
        $save_url = 'upload/state/' . $name_gen;
        $request->validate(
            [
                'state_name' => 'required',
            ]
        );
        State::insert([
            'state_name' => $request->state_name,
            'state_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'State Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all_state')->with($notification);
    } //end method
    public function EditState($id)
    {
        $states = State::findOrFail($id);
        return view('backend.state.edit_state', compact('states'));
    } //End method

    public function UpdateState(Request $request)
    {
        $state_id = $request->id;

        if ($request->file('state_image')) {
            $image = $request->file('state_image');
            // dd($image);
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 275)->save('upload/state/' . $name_gen);
            $save_url = 'upload/state/' . $name_gen;
            // dd($save_url);
            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
                'state_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'State Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all_state')->with($notification);
        } else {

            State::findOrFail($state_id)->update([
                'state_name' => $request->state_name,
            ]);

            $notification = array(
                'message' => 'State Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all_state')->with($notification);
        }
    } //end method
    public function DeleteState($id)
    {

        $state = State::findOrFail($id);
        $img = $state->state_image;
        unlink($img);

        State::findOrfail($id)->delete();
        $notification = array(
            'message' => 'State Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
