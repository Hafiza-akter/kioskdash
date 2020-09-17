@extends('admin/master')
@section('title','Home')

@section('mainmodule','')
@section('modulename','home')
@section('pagename','home')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <?php
      if(Session()->get('is_admin') == 0){
      $token ="token=".$jwtToken ?>
        <div class="col-md-3 offset-md-5 mb-3">
        <a href="{{route('dashboard',$token)}}" target="_blank" class="btn btn-primary btn-sm dash-view"><i class="fas fa-chart-line"></i> &nbsp;View Dashboard </a>

        </div>
      <?php } ?>
    </div>
  </div> <!-- /.row-->
</div><!-- /.container-fluid -->
@endsection