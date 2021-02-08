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
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 10px">#</th>
            <th>Slide Name</th>
            <!-- <th>User Level </th>
                      <th>Location</th> -->
            <th>Pcode</th>
            <th>Image</th>
            <th style="width: 100px">Description</th>
            <th style="width: 100px">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $i=1 @endphp
          @foreach($slideImageList as $slide)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $slide->getSlideDetails->slide_name }}</td>
            <!-- <td>{{ $slide->loc_level }}</td> -->
                      <td>
                          <?php
                          if (!$slide->pcode) { ?>
                          {{'N/A'}}
                        <?php  } else { ?>
                          {{ getLocation($slide->pcode) }}
                       <?php  }
                              
                        ?>
                      </td>
            <!-- <td>{{ $slide->pcode }}</td> -->

            <td>
              <?php if ($slide->image_path) { ?>
                <img src="{{asset('images/slider').'/'.$slide->image_path}}" id="" style="{{($slide->image_path)? '':'display:none'}}; width:100px; height:auto" />
              <?php   } else {
                echo 'N/A';
              } ?>

            </td>

            <td>
              <?php if ($slide->description) {
                echo "$slide->description";
              } else {
                echo 'N/A';
              } ?>

            </td>

            <!-- <td> <a onclick="trashbtn();" href="{{route('slide.image.remove',$slide->id)}}"><i class="fas fa-trash"></i></a></td> -->
            <td><button class="btntrash btn-link" id="{{$slide->id}}"><i class="fas fa-trash "></i></button></td>
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <th style="width: 10px">#</th>
            <th>Slide Name</th>
            <!-- <th>User Level </th>
                      <th>Location</th> -->
            <th>Pcode</th>
            <th>Image</th>
            <th style="width: 100px">Description</th>
            <th style="width: 100px">Action</th>
          </tr>
        </tfoot>
      </table>

    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
    </div>
  </div>
</div><!-- /.container-fluid -->
@endsection