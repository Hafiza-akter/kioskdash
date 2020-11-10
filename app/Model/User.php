<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\SlideDetail;
use App\Model\SlideStatus;
use App\Model\SlideFilePath;
use App\Model\Location;
use App\Model\UserStation;

class User extends Model
{
    protected $table = 'user';

    public function getUserRole(){
         return $this->belongsTo(
             'App\Model\Role','role_id');
    }
    public function getUserLocation(){
        return $this->belongsTo(
            'App\Model\Location','location_id');
   }
   public function getSlider(){

   		$returnArray=array();
        $sliderArrayList=$this->hasOne('App\Model\SlideStatus')->first();
        $sliderOrder = explode(',',$sliderArrayList->slide_order);

        foreach($sliderOrder as $key=>$val){

        	$slider = SlideDetail::where('id',$val)->first();

        	$returnArray[$key]['id']=$slider->id;
        	$returnArray[$key]['location_id']=$this->location_id;
        	$returnArray[$key]['slide_name']=$slider->slide_name;
        	$returnArray[$key]['duration']=$slider->duration;
        	$returnArray[$key]['description']=$slider->description;
            $returnArray[$key]['type']=$slider->type;
            $returnArray[$key]['user_loc_level']=$this->user_loc_level;



        	$pCode = Location::where('id',$this->location_id)
        							->first();
        	$returnArray[$key]['pcode'] = null;

        	if($this->user_loc_level == 'upazila'){
        		$returnArray[$key]['pcode'] = $pCode->upazila_pcode;
        	}					
        	if($this->user_loc_level == 'union'){
        		$returnArray[$key]['pcode'] = $pCode->union_pcode;
        	}
        	if($this->user_loc_level == 'district'){
        		$returnArray[$key]['pcode'] = $pCode->district_pcode;
        	}
            $returnArray[$key]['up_pcode'] = $pCode->upazila_pcode; // temporary 

            $sliderImage = SlideFilePath::where('slide_detail_id',$val)
                                    ->where('pcode',$returnArray[$key]['pcode'])
                                    // ->where('loc_level',$this->user_loc_level)
                                    ->first();

            if($sliderImage){
                $returnArray[$key]['image']=$sliderImage->image_path;
                $returnArray[$key]['image_description']=$sliderImage->description;
            }else{
                $returnArray[$key]['image']=null;
                $returnArray[$key]['image_description']=null;
            }
            // $returnArray[$key]['image_pcode'] = isset($sliderImage->pcode) ? $sliderImage->pcode : null;


        	$sTd = $this->hasOne('App\Model\UserStation')->first();
        	if($sTd){
        		$returnArray[$key]['station_id']=$sTd->ffwc_stations_id;
        	}else{
        		$returnArray[$key]['station_id'] = null;
        	}
        }
        // dd($returnArray);
        return $returnArray;

   }

}
