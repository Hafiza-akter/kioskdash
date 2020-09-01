@extends('admin/master')
@section('title','Slide List')
@section('mainmodule',' Slide')
@section('modulename','Slide')
@section('pagename','list')
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
    <form class="form-horizontal" method="post" action="{{route('durationstore')}}">
        {{ csrf_field() }}
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Slide Name</th>
                        <th>Duration/<sub>seconds</sub></th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1;$j=1 @endphp
                    @foreach($slideList as $slide)
                    <tr>
                        <td>{{$j++}}</td>
                        <td>{{$slide->slide_name}}</td>
                        <td>
                            <input type="number" name="duration_{{$i++}}" value="{{$slide->duration}}" class="duration mb-1">
                            <!-- <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
                            </div> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
    <div class="card-footer">
        <div class="float-right">{{ $slideList->links() }}</div>
    </div>

</div><!-- /.container-fluid -->
@endsection