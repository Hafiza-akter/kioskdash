<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SlideFilePath extends Model
{
    protected $table = 'slide_file_path';

    public function getSlideDetails(){
        return $this->belongsTo('App\Model\SlideDetail','slide_detail_id');
    }
    public function getLocation(){
        return $this->belongsTo('App\Model\Location','location_id');
    }
}
