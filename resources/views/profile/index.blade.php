@extends('layouts.app')
@section('title', 'Profile ')
@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="panel panel-inverse">
                <div class="panel-heading">
                   <h4 class="panel-title">{{Auth::user()->name}}</h4>
                </div>
            <div class="panel-body">
                
                    <div class="row">
                      <div class="col-md-3 col-sm-12">
                        <div>
                            <strong>Name: </strong><small>{{$user->name}}</small><br>
                            <strong>Email: </strong><small>{{$user->email}}</small><br>
                            <strong>Country: </strong><small>{{$user->country}}</small><br>
                            <strong>Status: </strong><small>{{$user->status}}</small>
                        </div>
                        <form role="form" method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <h4>Profile Photo</h4>
                            @if(is_null($user->photo))
                            <img src="{{asset('images/profile/nopic.png')}}" class="img-thumbnail"><br/>
                            @else
                                <img src="{{asset('images/profile')}}/{{$user->photo}}" class="img-thumbnail"><br/>
                            @endif
                            <input type="file" name="photo" class="form-control">
                        </div>
                        <div class="form-group mx-auto">
                            <button type="submit" class="btn btn-info text-center">Update</button>
                        </div>
                        </form>
                      </div>
                      <div class="col-md-6 col-sm-12">
                          <div class="row">
                            <div class="col-md-12">
                                    <h3>List of Bulletin Boards Created by {{$user->name}}</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Bulletin Board Title</th>
                                                <th>Date Created</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($bulletins as $bulletin)
                                            <tr>
                                            <td>{{$bulletin->id}}</td>
                                            <td>{{$bulletin->title}}</td>
                                            <td>{{$bulletin->created_at->diffForHumans()}}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                                    data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon md-wrench" aria-hidden="true"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                                    data-toggle="tooltip" data-original-title="Delete">
                                                    <i class="icon md-close" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                          </div>
                          <br>
                          <hr>
                          <div class="row">
                            <div class="col-md-12">
                                    <h3>List of Bulletin Boards {{$user->name}} is subscribed to</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Bulletin Board Creator</th>
                                                <th>Bulletin Board Title</th>
                                                <th>Date Created</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($userbulletins as $userbulletin)
                                            <tr>
                                            <td>{{$userbulletin->bulletin->id}}</td>
                                            <td>{{$userbulletin->bulletin->user->name}}</td>
                                            <td><a style="text-decoration:none; color:grey;" href="{{route('bulletin', ['id' => $bulletin->id, 'slug' => $bulletin->slug])}}">{{$userbulletin->bulletin->title}}</a> </td>
                                            <td>{{$userbulletin->bulletin->created_at->diffForHumans()}}</td>
                                           
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                          </div>
                        
                      </div>
                    </div>
                  
            </div>
        </div>
    </div>
</div>
@endsection