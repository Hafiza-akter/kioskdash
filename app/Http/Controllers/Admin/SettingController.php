<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Role;
use App\Model\FfwcStation;
use App\Model\UserStation;
use App\Model\SlideDetail;
use App\Model\Location;
use App\Model\SlideStatus;
use Hash;


class SettingController extends Controller
{
    
    public function slideList()
    {
        $slideList = SlideDetail::orderBy('id', 'ASC')->get();
        // dd($slideList);
        return view('admin/slide/list', compact('slideList'));
    }

    public function slideDuration(Request $request)
    {
        $slideCount = SlideDetail::all()->count();
        for ($i = 1; $i <= $slideCount; $i++) {
            $slideDetails = SlideDetail::where('id', $i)->first();
            $field_name = 'duration_' . $i;
            $duration_time = $request->input($field_name);
            $slideDetails->duration = $duration_time;
            $slideDetails->save();
        }
        return redirect()->route('slidelist')->with('message', 'Slide Duration Time Updated Successfully!');
    }
    public function floodSummary(){
        $slideDetails = SlideDetail::where('slide_name','Flood Summary')->first();
        return view('admin/slide/floodsummary',compact('slideDetails'));
    }
    public function floodSummaryStore(Request $request){
        $floodSummary = $request->input('flood_summary');
        $slideDetails = SlideDetail::where('slide_name','Flood Summary')->first();
        $slideDetails->description = $floodSummary;
        $slideDetails->save();
        return redirect()->route('floodsummary')->with('message', 'Flood Summary Updated Successfully!');

    }
}
