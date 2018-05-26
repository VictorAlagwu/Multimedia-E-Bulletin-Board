@extends('layouts.admin')
@section('content')
<div class="page">
    <div class="page-content container-fluid">
            <h3>{{$bulletin->title}}</h3>
       <div class="row" data-plugin="matchHeight" data-by-row="true">
      <form method="POST" action="{{route('user/bulletin')}}">
        {{ csrf_field()}}
            <div class="col-lg-12">
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
                </div>
      </form>
            
       </div>
    </div>
</div>
    