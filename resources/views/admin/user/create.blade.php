@extends('admin/master')
@section('title','Add User')
@section('mainmodule',' ')
@section('modulename','User')
@section('pagename','add user')
@section('useradd','active')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add new user</h3>
                <a class="btn-sm btn-primary float-right custombtn1" href="{{route('userlist')}}" role="button"><i class="fas fa-list"></i> User List</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <form class="form-horizontal" method="post" action="{{route('userstore')}}" onsubmit="sortablesubmit()">
                {{ csrf_field() }}
                <div class="card-body">
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" required placeholder="Email" id="email_address">
                      <span id="email_check"></span>
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" required class="form-control" name="password" required placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group required row">
                    <label class="col-sm-2  required col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" required name="role_id" id="role_id" required>
                            <option value="">--select--</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>                    
                        </div>
                  </div>
                  <span id="locuserfield">

                  <div class="form-group  row">
                  <label class="col-sm-2 col-form-label">User level</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="user_level" name="user_loc_level">
                            <option value="">--select--</option>
                            <option value="district">District</option>
                            <option value="upazila">Upazila</option>
                            <option value="union">Union</option>
                        </select> 
                  </div>
                  </div>
                  <div class="form-group  row" id="district">
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

                  <div class="form-group  row" id="upazila">
                  <label class="col-sm-2 col-form-label">Upazila</label>
                        <div class="col-sm-10"> 
                            <select class="form-control select2bs4" style="width: 100%;" name="upazila" id="upazila_name" >
                            <option value="">--select--</option>
                             
                            </select>                
                        </div>
                  </div>

                  <div class="form-group  row" id="union">
                  <label class="col-sm-2 col-form-label">Union</label>
                        <div class="col-sm-10"> 
                            <select class="form-control select2bs4" style="width: 100%;" name="union" id="union_name">
                            <option value="">--select--</option>
                              
                            </select>                
                        </div>
                  </div>
                  
                  <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Zoom level</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="zoom_level" placeholder="Zoom level">
                    </div>
                  </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label">Station</label>
                    <div class="col-sm-10 select2-purple">
                      <select class="select2" name="ffwc_sations[]" multiple="multiple" data-placeholder="Select a station" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          @foreach($ffwcStations as $ffwcStation)
                            <option value="{{$ffwcStation->id}}">{{$ffwcStation->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12"><p class="text-bold slide mt-3">Assign Slides and Sorting</p></div>
                    <div class="col-sm-12">
                    <ul id="sortable">
                        @foreach($slideDetails as $slideDetail)
                        <li id="{{$slideDetail->id}}" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><input name = "slide[]" value="{{$slideDetail->id}}" class="habi form-check-input mr-2" type="checkbox"><span class="habi">{{$slideDetail->slide_name}}</span></li>
                        @endforeach
                       </ul>
                    </div>
                  </div>

                  </span>
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
</div>

@endsection