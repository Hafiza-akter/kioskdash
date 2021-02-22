<?php 
use App\Model\Location;
use App\Model\SlideFilePath;

if (! function_exists('getLocation')) {
	function getLocation($pcode)
	{ 
		$level = '';
		$data = Location::Where('district_pcode',$pcode)->first();
		if($data != null){
			$level = $data->district_name;
		}
		else{
			$data = Location::Where('upazila_pcode',$pcode)->first();
			if($data != null){
				$level = $data->district_name. ' -' . $data->upazila_name;
			}
			else{
				$data = Location::Where('union_pcode',$pcode)->first();
				if($data != null){
					$level = $data->district_name. ' -' . $data->upazila_name . ' -' . $data->union_name;
				}
			}
		}
		
		// dd($level);
		return $level;

	}
   }

?>