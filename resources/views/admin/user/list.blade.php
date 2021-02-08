@extends('admin/master')
@section('title','User List')
@section('mainmodule','')
@section('modulename','User')
@section('pagename','list')
@section('home','userlist')

@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
          <th style="width: 10px">#</th>
          <th>Username</th>
          <th>Loc level</th>
          <th>Role </th>
          <th>Location</th>
          <th style="width: 100px">Action</th>
          </tr>
        </thead>
        <tbody>
        @php $i=1 @endphp
        @foreach($userList as $user)
        <tr>
          <td>{{ $i++ }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ ($user->user_loc_level) ? $user->user_loc_level:'N/A' }}</td>
          <td>{{ $user->getUserRole->name }}</td>
          <td>
            <?php
            if (!$user->getUserLocation) { ?>
              {{'N/A'}}
              <?php  } else {
              if (($user->user_loc_level == 'union')) {
              ?>
                {{ ($user->getUserLocation->district_name) ?  $user->getUserLocation->district_name : ''}}
                {{ ($user->getUserLocation->upazila_name) ?  "-".$user->getUserLocation->upazila_name : ''}}
                {{ ($user->getUserLocation->union_name) ?  "-".$user->getUserLocation->union_name : ''}}
              <?php  } elseif (($user->user_loc_level == 'upazila')) { ?>
                {{ ($user->getUserLocation->district_name) ?  $user->getUserLocation->district_name : ''}}
                {{ ($user->getUserLocation->upazila_name) ?  "-".$user->getUserLocation->upazila_name : ''}}

              <?php } elseif (($user->user_loc_level == 'district')) { ?>
                {{ ($user->getUserLocation->district_name) ?  $user->getUserLocation->district_name : ''}}
            <?php  } else {
                echo 'N/A';
              }
            }
            ?>
          </td>
          <td>
            <a href="{{route('useredit',$user->id)}}"><i class="fas fa-edit"></i></a>
            <!-- <a href="" onclick="return confirm('Are you sure?')" class="disabled"><i class="fas fa-trash-alt disabled"></i></a> -->
          </td>
        </tr>
        @endforeach
      </tbody>
        <tfoot>
          <tr>
          <th style="width: 10px">#</th>
          <th>Username</th>
          <th>Loc level</th>
          <th>Role </th>
          <th>Location</th>
          <th style="width: 100px">Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
 
  
</div>
</div><!-- /.container-fluid -->

@endsection