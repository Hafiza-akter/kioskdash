<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SlideFilePath;
use App\Model\SlideDetail;


class APIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataUpload(Request $request)
    {
        $slideId = $request->input('slide_id');
        $file = $request->file('slide_image');
        $pcode = $request->input('pcode');
        $description = $request->input('description');
        $checkSlide = SlideDetail::where('id',$slideId)->first();
        if ($slideId == '' || $pcode == '') {
            return response()->json(['status' => 0, 'statusCode' => 'E100', 'statusDetail' => 'parameter missing']);
        }
        if(!$checkSlide){
            return response()->json(['status' => 0, 'statusCode' => 'E101', 'statusDetail' => 'invalid slide id']);
        } else {
            $slideImage = SlideFilePath::where('slide_detail_id', $slideId)
                ->where('pcode', $pcode)
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
                    $filename = rand(1, 9000).strtotime("now");
                    $file->move(public_path() . '/images/slider/', $filename . '_slider_image' . '.' . $file->getClientOriginalExtension());
                    $path = $filename . '_slider_image' . '.' . $file->getClientOriginalExtension();
                    $imgfullPath = $path;
                    $slideImage->image_path = $imgfullPath;
                } else {
                    $slideImage->image_path = null;
                }
                $slideImage->description = $description;
                $slideImage->save();
            } else {
                $newSlideImage = new SlideFilePath();
                $newSlideImage->slide_detail_id = $slideId;
                $newSlideImage->pcode = $pcode;
                $newSlideImage->description = $description;

                if ($request->hasFile('slide_image')) {
                    $file = $request->file('slide_image');
                    $filename = rand(100, 9999).strtotime("now");
                    $file->move(public_path() . '/images/slider/', $filename . '_slider_image' . '.' . $file->getClientOriginalExtension());
                    $path = $filename . '_slider_image' . '.' . $file->getClientOriginalExtension();
                    $imgfullPath = $path;
                    $newSlideImage->image_path = $imgfullPath;
                }
                $newSlideImage->save();
            }
            return response()->json(['status' => 1, 'statusCode' => 'S103', 'statusDetail' => 'successfully data uploaded']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
