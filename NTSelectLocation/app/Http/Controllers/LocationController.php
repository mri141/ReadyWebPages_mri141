<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Counter;
use App\Models\Vehicle;

class LocationController extends Controller
{
    public function index(){
        $divisions = Division::all();
        $districts = District::all();
        $vehicles = Vehicle::all();
        $counters = Counter::all();
        return view('front.home',compact('divisions','districts','vehicles','counters'));
    }
    public function get_all_district(Request $request){
        $division_id = $request->division_id;
        $data = District::where('division_id', $division_id)->get();
        return response()->json($data);
    }
    public function get_all_counter(Request $request){
        $vehicle_id = $request->vehicle_id;
        $data = Counter::where('vehicle_id', $vehicle_id)->get();
        return response()->json($data);
    }

}
