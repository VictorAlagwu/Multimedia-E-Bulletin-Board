@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">{{$bulletin->title}}</div>
                <div class="panel-body">
                    <article>
                        {!!$bulletin->subject!!}
                    </article>
                        @if ($bulletin->file_ext == 'image')
                            <p>{{'File Type:- '.$bulletin->file_ext}}</p>
                            <figure>
                                <img class="img-responsive" src="{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" alt="{{$bulletin->title}}">
                            </figure>
                        @elseif($bulletin->file_ext == 'audio')
                            <p>{{'File Type:- '.$bulletin->file_ext}}</p>
                            <audio controls>
                            <source src="{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" type="audio/{{$bulletin->extension}}">
                                Your browser does not support the audio tag.
                            </audio>
                        @elseif($bulletin->file_ext == 'video')
                            <p>{{'File Type:- '.$bulletin->file_ext}}</p>
                            <video controls>
                                    <source src="{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" type="video/{{$bulletin->extension}}">
                                    Your browser does not support the video tag.
                            </video>
                        @elseif($bulletin->file_ext == 'document')
                            <p>{{'File Type:- '.$bulletin->file_ext}}</p>
                            <figure class="image is-4by3">
                                <img class="img-responsive" width="40px" src="{{ asset('images/document.png') }}" alt="Audio image" id="audio_image">
                            </figure>
                            <a class="button is-primary" href="{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) .'/'.$bulletin->file_ext.'/'.$bulletin->title.'.'.$bulletin->extension }}" target="_blank">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                &nbsp;Download
                            </a>
                        @else
                        <p>No File Uploaded</p>
                        @endif
                </div>
            </div>
       
         @foreach ($posts as $post)
            @include('bulletin.post')
        @endforeach 
            {{$posts->links()}}
        @if(auth()->check())
        
           <form method="POST" action="{{route('post', ['id' => $bulletin->id])}}">
            {{csrf_field()}}
                <div class="form-group">
                    <label for="message" class="form-label">Enter New Post</label>
                    <textarea name="message" id="body" class="form-control summernote" placeholder="Enter your post..." rows="3"></textarea>
                </div>
                <button class="btn btn-default text-center" type="submit">Enter Post</button>
           </form>
        @else
           <p class="text-center">Please <a href="/login">Sign-In</a> to reply this Bulletin Board</p> 
        @endif
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
</div>
@endsection
