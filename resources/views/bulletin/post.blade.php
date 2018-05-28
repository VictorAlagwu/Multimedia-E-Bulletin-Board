<div class="panel panel-success panel-line">
    <div class="panel-heading">
        <h3 class="panel-title">{{$post->user->name}}
            <small>said {{$post->created_at->diffForHumans()}}</small>
        </h3>
    </div>
    <div class="panel-body"> {!!$post->message!!}</div>
</div>