<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\ProperyType;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
public function AllProperty()
{
$property=Property::latest()->get();
return view('backend.property.all_property',compact('property'));
}//End Method

public function Addproperty()
{ 
    $propertytype=ProperyType::latest()->get();
    $amenties=Amenities::latest()->get();
    $activeagent=User::where('status','active')->where('role','agent')->latest()->get();
    return view('backend.property.add_property',compact('propertytype','amenties','activeagent'));
}
}
