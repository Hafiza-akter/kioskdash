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
use App\Model\SlideFilePath;
use App\Model\SlideStatus;
use Hash;


class SettingController extends Controller
{

    public function slideList()
    {
        $slideList = SlideDetail::orderBy('id', 'ASC')->get();
        // dd($slideList);
        $is_active = 'slideList';
        return view('admin/slide/list', compact('is_active','slideList'));
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
    public function floodSummary()
    {
        $slideDetails = SlideDetail::where('slide_name', 'Flood Summary')->first();
        $is_active = 'floodSummary';
        return view('admin/slide/floodsummary', compact('is_active','slideDetails'));
    }
    public function floodSummaryStore(Request $request)
    {
        $floodSummary = $request->input('flood_summary');
        $slideDetails = SlideDetail::where('slide_name', 'Flood Summary')->first();
        $slideDetails->description = $floodSummary;
        $slideDetails->save();
        return redirect()->route('floodsummary')->with('message', 'Flood Summary Updated Successfully!');
    }
    public function slideImgList()
    {
        $slideImageList = SlideFilePath::orderBy('id', 'DESC')->paginate(5);
        $is_active = 'slideImageList';
        return view('admin/slide/image/list', compact('is_active','slideImageList'));
    }
    public function slideImgView()
    {
        $slideList = SlideDetail::orderBy('id', 'ASC')->get();
        $locations = Location::select('district_name', 'id')->groupBy('district_name')->get();
        $is_active = 'slideImageList';
        return view('admin/slide/image/create', compact('is_active','slideList', 'locations'));
    }
    public function slideImgStore(Request $request)
    {
        //   dd($request);
        $validateData = $request->validate([
            'slide_id' => 'required',
            'user_loc_level' => 'required',
            'district' => 'required',
            'upazila' => 'required_if:user_loc_level,upazila,union',
            'union' => 'required_if:user_loc_level,union',
            'slide_image' => 'required',

        ]);
        $slideId = $request->input('slide_id');
        $locLevel = $request->input('user_loc_level');
        $description = $request->input('description');
        // $slideImage = new SlideFilePath();

        // $slideImage->slide_detail_id = $slideId;
        if ($locLevel == 'district') {
            $locationId = $request->input('district');
        } elseif ($locLevel == 'upazila') {
            $locationId = $request->input('upazila');
        } elseif ($locLevel == 'union') {
            $locationId = $request->input('union');
        }
        // $slideImage->loc_level = $locLevel;
        // $slideImage->description = $description;
        $slideImage = SlideFilePath::where('slide_detail_id', $slideId)
            ->where('location_id', $locationId)
            ->first();
        if ($slideImage) {
            $oldImage = $slideImage->image_path;
            // dd($oldImage);
            if ($oldImage) {
                $oldImagepath = public_path() . '/images/slider/' . $oldImage;
                unlink($oldImagepath);
            }
            if ($request->hasFile('slide_image')) {
                $file = $request->file('slide_image');
                $filename = rand(1, 9000);
                $file->move(public_path() . '/images/slider/', $filename . '_slider_image' . '.' . $file->getClientOriginalExtension());
                $path = $filename . '_slider_image' . '.' . $file->getClientOriginalExtension();
                $imgfullPath = $path;
                $slideImage->image_path = $imgfullPath;
                $slideImage->save();
            }
        } else {
            $newSlideImage = new SlideFilePath();
            $newSlideImage->slide_detail_id = $slideId;
            $newSlideImage->location_id = $locationId;
            $newSlideImage->loc_level = $locLevel;
            $newSlideImage->description = $description;
            if ($request->hasFile('slide_image')) {
                $file = $request->file('slide_image');
                $filename = rand(1, 9000);
                $file->move(public_path() . '/images/slider/', $filename . '_slider_image' . '.' . $file->getClientOriginalExtension());
                $path = $filename . '_slider_image' . '.' . $file->getClientOriginalExtension();
                $imgfullPath = $path;
                $newSlideImage->image_path = $imgfullPath;
            }
            $newSlideImage->save();
        }

        return redirect()->route('slide.image.list')->with('message', 'Slide Image Upload Successfully!');
    }
    public function slideImgRemove($id){
        $slideImg = SlideFilePath::find($id);
        $oldImage = $slideImg->image_path;
            // dd($oldImage);
            if ($oldImage) {
                $oldImagepath = public_path() . '/images/slider/' . $oldImage;
                unlink($oldImagepath);
            }
        $slideImg->delete();
        return redirect()->route('slide.image.list')->with('message', 'Slide Image Removed Successfully!');

    }
}
