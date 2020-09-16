@extends('admin/master')
@section('title','Slide image')
@section('mainmodule','')
@section('modulename','Slide image')
@section('pagename','list')
@section('content')
<div class="container-fluid">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Slide Image list</h3>
                <a class="btn btn-sm btn-primary float-right" href="{{route('slide.image.view')}}" role="button"><i class="fas fa-plus"></i> Add</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Slide Name</th>
                      <th>User Level </th>
                      <th>Location</th>
                      <th>Image</th>
                      <th>Description</th>
                      <th style="width: 100px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @php $i=1 @endphp
                 @foreach($slideImageList as $slide)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $slide->getSlideDetails->slide_name }}</td>
                      <td>{{ $slide->loc_level }}</td>
                      <td>
                                <?php
                                if(!$slide->getLocation){?>
                                {{'N/A'}}
                            <?php  }
                                else{ 
                                if(($slide->loc_level == 'union')){
                                ?>
                                {{ ($slide->getLocation->district_name) ?  $slide->getLocation->district_name : ''}}
                                {{ ($slide->getLocation->upazila_name) ?  "-".$slide->getLocation->upazila_name : ''}}
                                {{ ($slide->getLocation->union_name) ?  "-".$slide->getLocation->union_name : ''}}
                            <?php  }
                            elseif(($slide->loc_level == 'upazila')){ ?>
                                {{ ($slide->getLocation->district_name) ?  $slide->getLocation->district_name : ''}}
                                {{ ($slide->getLocation->upazila_name) ?  "-".$slide->getLocation->upazila_name : ''}}
                            
                            <?php } 
                            elseif(($slide->loc_level == 'district')){ ?>
                                {{ ($slide->getLocation->district_name) ?  $slide->getLocation->district_name : ''}}
                            <?php  }
                                else{
                                    echo 'N/A';
                                }
                                }                      
                            ?>
                        </td>
                      <td>
                      <?php if($slide->image_path) { ?>
                        <img src="{{asset('images/slider').'/'.$slide->image_path}}" id="" style="{{($slide->image_path)? '':'display:none'}}; width:100px; height:auto" />
                      <?php   } 
                      else{
                            echo 'N/A';
                        }?>
                      
                      </td>
                      <td>
                      <?php if($slide->description) { 
                        echo "$slide->description"; 
                      }
                      else{
                        echo 'N/A';

                      }?>

                      </td>

                      <!-- <td> <a onclick="trashbtn();" href="{{route('slide.image.remove',$slide->id)}}"><i class="fas fa-trash"></i></a></td> -->
                      <td><button  class="btntrash btn-link" id="{{$slide->id}}"><i class="fas fa-trash "></i></button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <div class="float-right">{{ $slideImageList->links() }}</div> 
              </div>
            </div>
      </div><!-- /.container-fluid -->
@endsection