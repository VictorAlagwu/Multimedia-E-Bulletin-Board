<div class="panel panel-success panel-line">
    <div class="panel-heading">
        <h3 class="panel-title">{{$post->user->name}}
            <small>said {{$post->created_at->diffForHumans()}}</small>
        </h3>
    </div>
    <div class="panel-body"> {!!$post->message!!} {{$post->filename}}</div>
    <div class="panel-footer" style="background-color:#80808052;">
        @if ($post->file_ext == 'image')
        <span>File Type:- <i style="text-transform:capitalize;">{{$post->file_ext}}</i></span>
        <figure>
            <img width="500" class="img-responsive" src="{{ asset('storage/' . Auth::user()->name . '_' . Auth::id()) .'/'.$post->file_ext.'/'.$post->filename }}" alt="{{$post->title}}">
        </figure>
    @elseif($post->file_ext == 'audio')
    <span>File Type:- <i style="text-transform:capitalize;">{{$post->file_ext}}</i></span>
    <audio controls>
        <source src="{{asset('storage/' . $post->user->name . '_' . $post->user->id) .'/'.$post->file_ext.'/'.$post->filename}}" type="audio/{{$post->extension}}">
     
    Your browser does not support the audio tag.
        </audio>
    @elseif($post->file_ext == 'video')
    <span>File Type:- <i style="text-transform:capitalize;">{{$post->file_ext}}</i></span>
    <video controls>
                <source src="{{ asset('storage/' . $post->user->name . '_' . $post->user->id) .'/'.$post->file_ext.'/'.$post->filename}}" type="video/{{$post->extension}}">
                Your browser does not support the video tag.
        </video>
    @elseif($post->file_ext == 'document')
    <span>File Type:- <i style="text-transform:capitalize;">{{$post->file_ext}}</i></span>
    <figure class="image is-4by3">
            <img class="img-responsive" width="40px" src="{{ asset('images/document.png') }}" alt="Audio image" id="audio_image">
        </figure>
        <a class="button is-primary" href="{{ asset('storage/' . $post->user->name . '_' . $post->user->id) .'/'.$post->file_ext.'/'.$post->filename}}" target="_blank">
            <i class="fa fa-download" aria-hidden="true"></i>
            &nbsp;Download
        </a>
    @else
    <p>No File Uploaded</p>
    @endif
    </div>
</div>