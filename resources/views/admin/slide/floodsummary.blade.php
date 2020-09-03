@extends('admin/master')
@section('title','Flood Summary')
@section('mainmodule','')
@section('modulename','Flood Summary')
@section('pagename','list')
@section('floodsummary','active')
@section('content')
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form role="form" class="form-horizontal" method="post" action="{{route('floodsummary.store')}}" enctype="multipart/form-data">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)`
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{ csrf_field() }}
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                     Message
                </h3>

            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
                <div class="mb-3">
                    <!-- <label class="col-sm-12 col-form-label">Message</label> -->
                <textarea placeholder="Place some text here" class="customEditor" name="flood_summary" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    {{$slideDetails->description}}
                </textarea>
                </div>

                <div class="form-group pt-5">
                    <button type="submit" class="btn-primary btn">Submit <i class="fas fa-check"></i></button>
                </div>
                <p class="text-sm mb-0">
                    <a href="#">
                        Feedback or custom message.</a>
                </p>

            </div>
        </div>
    </form>


</div><!-- /.container-fluid -->
@endsection