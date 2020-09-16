@extends('admin/master')
@section('title','Slide Image')
@section('mainmodule','')
@section('modulename','Slide image')
@section('pagename','upload')
@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Upload Slide Image</h3>
                    <a class="btn-sm btn-primary float-right custombtn1" href="{{route('slide.image.list')}}" role="button"><i class="fas fa-list"></i> Image List</a>
                </div>
                <!-- /.card-header -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- form start -->

                <form class="form-horizontal" method="post" action="{{route('slide.image.store')}}" enctype="multipart/form-data"> 
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="form-group required row">
                            <label class="col-sm-2 col-form-label">Slide Name</label>
                            <div class="col-sm-10">
                                <select class="form-control select2bs4" required name="slide_id">
                                    <option value="">--select--</option>
                                    @foreach($slideList as $slide)
                                    <option value="{{$slide->id}}">{{$slide->slide_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group required row">
                            <label class="col-sm-2 col-form-label">User level</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="user_level" required name="user_loc_level">
                                    <option value="">--select--</option>
                                    <option value="district">District</option>
                                    <option value="upazila">Upazila</option>
                                    <option value="union">Union</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group required  row" id="district">
                            <label class="col-sm-2 col-form-label">District</label>
                            <div class="col-sm-10">
                                <select class="form-control select2bs4" style="width: 100%;" name="district" id="district_name">
                                    <option value="">--select--</option>
                                    @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->district_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group required row" id="upazila">
                            <label class="col-sm-2 col-form-label">Upazila</label>
                            <div class="col-sm-10">
                                <select class="form-control select2bs4" style="width: 100%;" name="upazila" id="upazila_name">
                                    <option value="">--select--</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group required row" id="union">
                            <label class="col-sm-2 col-form-label">Union</label>
                            <div class="col-sm-10">
                                <select class="form-control select2bs4" style="width: 100%;" name="union" id="union_name">
                                    <option value="">--select--</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file"  name="slide_image" accept="image/jpeg,image/png" class="form-control">
                            </div>
                        </div>

                        <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control customEditor"  name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                        <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </div>


</div><!-- /.container-fluid -->
@endsection