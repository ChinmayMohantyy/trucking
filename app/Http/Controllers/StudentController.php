<?php

namespace App\Http\Controllers;

use App\User;

use App\Models\Addload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
   public function view(){
     
      $users = User::all();
    return view('admin.user',compact('users'));
    
   }
   public function viewloads()
   {
      $addload_view = Addload::get();

     return view('load', compact('addload_view'));
   }

   public function viewaddloads()
   {
      return view('addload');
   }

    public function saveaddload(Request $request)
    {
      //  dd($request->all());
       $add_load = new Addload();
       $add_load->admin_id = Auth::user()->id;
       $add_load->pickup = $request->pickup;
       $add_load->date = $request->date;
       $add_load->origin = $request->origin;
       $add_load->destination = $request->destination;
       $add_load->weight = $request->weight;
       $add_load->distance = $request->distance;
       $add_load->truck_type = $request->truck_type;
       $add_load->price = $request->price;
       $add_load->per_meter_price = $request->per_meter_price;
      
       $add_load->save();
       
      return redirect(url('/admin/loads'));

    }
}
