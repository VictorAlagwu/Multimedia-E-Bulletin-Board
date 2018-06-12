@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="panel panel-inverse">
                <div class="panel-heading">
                   <h4 class="panel-title">{{Auth::user()->name}}</h4>
                </div>
            <div class="panel-body">
                <form role="form" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                        <h4>Profile Photo</h4>
                           <img src="{{asset('images/profile')}}/{{$user->photo}}" class="img-thumbnail"><br/>
                           <input type="file" name="photo" class="form-control">
                          </div>
                      </div>
                     
                      </div>
                        
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Update</button>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection