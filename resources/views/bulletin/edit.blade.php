
@extends('layouts.app')
@section('title', 'Edit Bulletin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success panel-line">
                <div class="panel-heading">
                    <h3>
                        <div class="panel-title">
                            Update the Bulletin Board
                        </div>
                    </h3>
                </div>

                <div class="panel-body">
                @if (auth()->check())
            
                    <form method="POST" action="{{route('bulletin/edit', ['id' => $bulletin->id,'slug'=>$bulletin->slug])}}" enctype="multipart/form-data">
                    {{ csrf_field()}}
                    {{ method_field('patch') }}

                    @if(count($errors))
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                    <div class="form-group">
                        <h3>Bulletin Board Title</h3>
                    <input type="text" name="title" id="title" class="form-control" value="{{$bulletin->title}}" disabled/>
                    </div>
                    <h3>Add File</h3>
                    <label class="btn btn-success btn-file" for="my-file-selector">
                            <input id="my-file-selector" name="file" type="file" style="display:none" 
                            onchange="$('#upload-file-info').html(this.files[0].name)">
                            Upload <i class="icon md-upload" aria-hidden="true"></i>
                    </label>
                     <span class='label label-info' id="upload-file-info"></span>
                       
                    <div class="form-group">
                        <h3>Bulletin Board Subject</h3>
                        <textarea class="form-control summernote" name="subject" id="subject" rows="20">{{$bulletin->subject}}</textarea>
                    </div>
                        <button class="btn btn-default text-center" type="submit" name="submit">Update Bulletin Board</button>
                   
                    </form>
                @else
                    <p>Please <a href="/login">Sign-In</a> to create a new bulletin board</p>

                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
