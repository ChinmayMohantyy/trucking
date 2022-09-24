<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\PostTruck;
use App\Models\Addload;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $add_load = Addload::paginate(4);
        return view('home',compact('add_load'));
        
    }
    public function truckshow()
    {
       $truck_details = PostTruck::paginate(4);
       return view('truckprofile',compact('truck_details'));
    }
    public function showprofile()
     { 
        return view('myprofile');
     }

     public function savePostTruck(Request $request)
     {
        // dd($request->all());
        $post_truck = new PostTruck();
        $post_truck->reference = $request->reference;
        $post_truck->truck_type = $request->truck_type;
        $post_truck->weight = $request->weight.$request->weight_size;
        $post_truck->length = $request->length;
        $post_truck->origin = $request->origin;
        $post_truck->destination = implode(',',$request->languageSelect);
        $post_truck->min_hauling_distance = $request->min_hauling_distance;
        $post_truck->max_hauling_distance = $request->max_hauling_distance;
        $post_truck->desired_rate_per_mile = $request->desired_rate_per_mile;
        $post_truck->avilibility_date = $request->avilibility_date;
        $post_truck->description = $request->description;
        $post_truck->contact_name = $request->contact_name;
        $post_truck->phone = $request->phone;
        $post_truck->email = $request->email;
        $post_truck->save();
        return redirect(url('/truck-profile')); 
     }

     public function show()
     {
        return view('myloade');
     }

     public function serviceshow()
     {
        return view('toolservice');
     }

     public function showpost()
     {
        $user_profile = User::first();
       return view('posttruck',compact('user_profile'));
     }

     
}
