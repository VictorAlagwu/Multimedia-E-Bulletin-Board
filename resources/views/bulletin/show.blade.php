
@extends('layouts.default')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <!-- Heading With Desc -->
            <div class="panel panel-info panel-line">
                <div class="panel-heading">
                    <h4 class="panel-title">{{$bulletin->title}}
                        <small>created by {{$bulletin->user->name}}</small>
                    </h4>
                </div>
                <div class="panel-body">
                    <p>{!!$bulletin->subject!!}</p>
                </div>
                <div class="panel-footer" style="background-color:#80808052;">
                    @if ($bulletin->file_ext == 'image')
                    
                    <figure>
                        <img width="200" class="img-responsive" src="{{ asset('storage/' . $bulletin->user->name . '_' . $bulletin->user->id) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" alt="{{$bulletin->title}}">
                    </figure>
                    <span>File Type:- <i style="text-transform:capitalize;">{{$bulletin->file_ext}}</i></span>
                
                    @elseif($bulletin->file_ext == 'audio')
                    <audio controls>
                        <source src="{{ asset('storage/' . $bulletin->user->name . '_' . $bulletin->user->id) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" type="audio/{{$bulletin->extension}}">
                        Your browser does not support the audio tag.
                    </audio>
                    <span>File Type:- <i style="text-transform:capitalize;">{{$bulletin->file_ext}}</i></span>
                    @elseif($bulletin->file_ext == 'video')
                    <video controls>
                                <source src="{{ asset('storage/' . $bulletin->user->name . '_' . $bulletin->user->id) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" type="video/{{$bulletin->extension}}">
                                Your browser does not support the video tag.
                    </video>
                    <span>File Type:- <i style="text-transform:capitalize;">{{$bulletin->file_ext}}</i></span>
                    @elseif($bulletin->file_ext == 'document')
                    <span>File Type:- <i style="text-transform:capitalize;">{{$bulletin->file_ext}}</i></span>
                    <figure class="image is-4by3">
                            <img class="img-responsive" width="40px" src="{{ asset('images/document.png') }}" alt="Audio image" id="audio_image">
                    </figure>
                        <a class="button is-primary" href="{{ asset('storage/' . $bulletin->user->name . '_' . $bulletin->user->id) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" target="_blank">
                            <i class="fa fa-download" aria-hidden="true"></i>
                            &nbsp;Download
                        </a>
                    @else
                    <p>No File Uploaded</p>
                    @endif
                </div>
            </div>
            
            <hr>
            @foreach ($posts as $post)
                @include('bulletin.post')
            <hr>
            @endforeach 
            {{-- @if($posts->count() > 5) --}}
                {{$posts->links('vendor.pagination.bootstrap-4')}}
            {{-- @endif --}}
            <br>
           
        </div>
        <div class="col-md-4">
             <div class="panel panel-default">
                <div class="panel-body">
                  <p>This Bulletin Board was created 
                        {{$bulletin->created_at->diffForHumans()}} by <a href="">{{$bulletin->user->name }} </a>
                  </p>
                </div>
             </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="POST" action="{{route('post/add', $bulletin->id)}}" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <h3 class="text-center">Enter New Post</h3>
                        <textarea name="message" id="body" class="form-control summernote" placeholder="Enter your post..." rows="3"></textarea>
                    </div>
                    <h3>Add File</h3>
                        <label class="btn btn-success btn-file" for="my-file-selector">
                                <input id="my-file-selector" name="file" type="file" style="display:none" 
                                onchange="$('#upload-file-info').html(this.files[0].name)">
                                Upload <i class="icon md-upload" aria-hidden="true"></i>
                        </label>
                         <span class='label label-info' id="upload-file-info"></span>
                    <div class="form-group text-center" style="padding-top:3px;">
                        <button class="btn btn-success text-center" type="submit">Enter Post</button>
                    </div>
               </form>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>

@endsection
