@extends('layouts.admin')
@section('content')
<div class="page">
    <div class="page-content container-fluid">
            <h3>{{$bulletin->title}}</h3>
       <div class="row" data-plugin="matchHeight" data-by-row="true"> 
        <div class="col-lg-6">
            <form method="POST" action="{{route('user/bulletin')}}">
                    {{ csrf_field()}}
                <h4 class="example-title">Add User To Bulletin Board</h4>
                <div class="form-group">
                    <select class="form-control" name="user_id">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>   
                        @endforeach
                    </select>
                </div>
                <div>
                <input type="hidden" name="bulletin_id" value="{{$bulletin->id}}"/>
                </div>
                <div class="form-group form-material row">
                    <legend class="col-md-4 col-form-legend">Subscribe to Bulletin: </legend>
                        <div class="col-md-8">
                            <div class="radio-custom radio-default radio-inline">
                            <input type="radio" id="inputHorizontalMale" name="subscribe" value="true" checked/>
                            <label for="subscribe">Yes</label>
                            </div>
                            <div class="radio-custom radio-default radio-inline">
                            <input type="radio" id="inputHorizontalFemale" name="subscribe" value="false"/>
                            <label for="subscribe">No</label>
                            </div>
                        </div>
                        </div>
                <div class="form-group">
                    <button class="btn btn-default text-center" type="submit" name="submit">Add User</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Added Users</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userbulletins as $userbulletin)
                    <tr>
                        <td>{{$userbulletin->id}}</td>
                        <td>{{$userbulletin->user->name}}</td>
                        <td>{{$userbulletin->subscribe == 1 ? "Subscribed":"Not Subscricbed"}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
            
       </div>
    </div>
</div>
    