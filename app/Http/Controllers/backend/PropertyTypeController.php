<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\ProperyType;


class PropertyTypeController extends Controller
{
    public function AllType()
    {
    $types=ProperyType::latest()->get();
    return view('backend.type.all_type',compact('types'));
    }//End Method
    public function AddType()
    {
        return view('backend.type.add_type');
    }//end method
    public function StoreType(Request $request)
    {
        $request->validate(
            [
                'type_name'=>'required|unique:propery_types|max:200',
                'type_icon'=>'required'
            ]
            );
     ProperyType::insert([
        'type_name' => $request->type_name,
        'type_icon' => $request->type_icon,
     ]);
     
     $notification=array(
        'message'=>'Property Type Created Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.type')->with($notification);
    }//end method
    public function EditType($id)
    {
        $types=ProperyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));
    }//End method
    public function UpdateType(Request $request)
    { $pid=$request->id;
       ProperyType::findOrFail($pid)->update([
        'type_name' => $request->type_name,
        'type_icon' => $request->type_icon,
     ]);
     
     $notification=array(
        'message'=>'Property Type Updated Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.type')->with($notification);
    }//end method
    public function DeleteType($id)
    {
        ProperyType::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Property Type Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }


   //// // Amenties method are present same controller////////////////////////
    public function AllAmenitie()
    {
    $amenitie=Amenities::latest()->get();
    return view('backend.amenities.all_amenitie',compact('amenitie'));
    }//End Method
    public function AddAmenitie()
    {
        return view('backend.amenities.add_amenitie');
    }//end method
    public function StoreAmenitie(Request $request)
    {
     Amenities::insert([
        'amenities_name' => $request->amenities_name,
         ]);
     $notification=array(
        'message'=>'Amenities Created Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all_amenitie')->with($notification);
    }//end method
    public function EditAmenitie($id)
    {
        $amenitie=Amenities::findOrFail($id);
        return view('backend.amenities.edit_amenitie',compact('amenitie'));
    }//End method
    public function UpdateAmenitie(Request $request)
    { $pid=$request->id;
       Amenities::findOrFail($pid)->update([
        'amenities_name' => $request->amenities_name,
        ]);
     
     $notification=array(
        'message'=>'Amenities Updated Successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all_amenitie')->with($notification);
    }//end method
    public function DeleteAmenitie($id)
    {
        Amenities::findOrfail($id)->delete();
        $notification=array(
            'message'=>'Amenities Deleted Successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
}
