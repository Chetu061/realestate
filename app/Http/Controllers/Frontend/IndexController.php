<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Amenities;
use App\Models\Facility;
use App\Models\MultiImage;
use App\Models\Property;
use App\Models\PropertyMessage;
use App\Models\ProperyType;
use App\Models\Schedule;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function PropertyDetails($id, $slug)
    {
        $property = Property::findOrFail($id);
        $multiImage = MultiImage::where('property_id', $id)->get();
        $amentities = $property->amenities_id;
        $amenit_data = explode(',', $amentities);
        $facility = Facility::where('property_id', $id)->get();
        $type_id = $property->ptype_id;
        $relatedProperty = Property::where('ptype_id', $type_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->limit(3)->get();
        return view('frontend.property.property_details', compact('property', 'multiImage', 'amenit_data', 'facility', 'relatedProperty'));
    }
    public function PropertyMessage(Request $request)
    {
        $pid = $request->property_id;
        $aid = $request->agent_id;
        if (Auth::check()) {
            $data = PropertyMessage::insert([
                'user_id' => Auth::user()->id,
                'agent_id' => $aid,
                'property_id' => $pid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
            // dd($request);
            $notification = array(
                'message' => 'Message Submitted Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
    public function AgentDetails($id)
    {
        $agent = User::find($id);
        $property = Property::where('agent_id', $id)->get();
        $featured = Property::where('featured', '1')->limit(3)->get();
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();
        return view('frontend.agent.agent_details', compact('agent', 'property', 'featured', 'rentproperty', 'buyproperty'));
    }
    public function AgentDetailsMessage(Request $request)
    {

        $aid = $request->agent_id;

        if (Auth::check()) {

            PropertyMessage::insert([

                'user_id' => Auth::user()->id,
                'agent_id' => $aid,
                'msg_name' => $request->msg_name,
                'msg_email' => $request->msg_email,
                'msg_phone' => $request->msg_phone,
                'message' => $request->message,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Send Message Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // End Method 

    public function RentProperty()
    {
        $property = Property::where('status', 1)->where('property_status', 'rent')->paginate(3);
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();
        return view('frontend.property.rent_property', compact('property', 'rentproperty', 'buyproperty'));
    }
    public function BuyProperty()
    {
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();
        $property = Property::with('user')->where('status', 1)
            ->where('property_status', 'buy')
            ->paginate(3);
        return view('frontend.property.buy_property', compact('property', 'buyproperty', 'rentproperty'));
    }
    public function PropertyType($id)
    {
        $rentproperty = Property::where('property_status', 'rent')->get();
        $buyproperty = Property::where('property_status', 'buy')->get();
        $property = Property::with('user')->where('status', '1')->where('ptype_id', $id)->get();
        // dd($property);
        $pbread = ProperyType::where('id', $id)->first();

        return view('frontend.property.property_type', compact('property', 'pbread', 'rentproperty', 'buyproperty'));
    } // End Method 

    public function StateDetails($id)
    {

        $property = Property::where('status', '1')->where('state', $id)->get();

        $bstate = State::where('id', $id)->first();
        return view('frontend.property.state_property', compact('property', 'bstate'));
    } // End Method

    public function BuyPropertySearch(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $sstype = $request->ptype_id;

        $property = Property::where('property_name', 'like', '%' . $item . '%')
            ->where('property_status', 'buy')
            ->with('type', 'pstate')
            // start form these
            ->whereHas('pstate', function ($q) use ($sstate) {
                $q->where('state_name', 'like', '%' . $sstate . '%');
            })
            ->whereHas('type', function ($q) use ($sstype) {
                $q->where('type_name', 'like', '%' . $sstype . '%');
            })
            // condition not statify
            ->get();

        // dd($property);
        return view('frontend.property.property_search', compact('property'));
    } // End Method
    public function RentPropertySeach(Request $request)
    {
        $request->validate(['search' => 'required']);
        $item = $request->search;
        $sstate = $request->state;
        $stype = $request->ptype_id;
        // dd($item);
        $property = Property::where('property_name', 'like', '%' . $item . '%')
            ->where('property_status', 'rent')->with('type', 'pstate')
            // not follow condition
            ->whereHas('pstate', function ($q) use ($sstate) {
                $q->where('state_name', 'like', '%' . $sstate . '%');
            })
            ->whereHas('type', function ($q) use ($stype) {
                $q->where('type_name', 'like', '%' . $stype . '%');
            })
            // end these
            ->get();
        // dd($property);
        return view('frontend.property.property_search', compact('property'));
    }
    public function AllPropertySeach(Request $request)
    {
        // dd($request);
        $property_status = $request->property_status;
        $stype = $request->ptype_id;
        $sstate = $request->state;
        $sbedrooms = $request->bedrooms;
        $sbathrooms = $request->bathrooms;

        $property = Property::where('status', '1')
            ->where('bedrooms', $sbedrooms)
            ->where('bathrooms', 'like', '%' . $sbathrooms . '%')
            ->where('property_status', $property_status)
            ->with('type', 'pstate')
            ->whereHas('pstate', function ($q) use ($sstate) {
                $q->where('state_name', 'like', '%' . $sstate . '%');
            })
            ->whereHas('type', function ($q) use ($stype) {
                $q->where('type_name', 'like', '%' . $stype . '%');
            })
            ->get();
        // dd($property);
        return view('frontend.property.property_search', compact('property'));
    }
    public function StoreSchedule(Request $request)
    {
        // dd($request);
        $property_id = $request->property_id;
        $agent_id = $request->agent_id;
        if (Auth::check()) {
            Schedule::insert([

                'user_id' => Auth::user()->id,
                'property_id' => $property_id,
                'agent_id' => $agent_id,
                'tour_date' => $request->tour_date,
                'tour_time' => $request->tour_time,
                'message' => $request->message,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Schedule Created Successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Plz Login Your Account First',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    }
}
