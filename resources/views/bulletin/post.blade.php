<div class="panel panel-default">
        <div class="panel-heading">
            <div class="level">
                <h5 class="flex">
                <a href="">
                    <i>{{$post->user->name}}</i>
                </a> said {{$post->created_at->diffForHumans()}}
                </h5>
            </div>
        </div>
      @if (Auth::check())
      <div class="panel-body" style="background-color: #92FFA4FF">
          {!!$post->message!!}
      </div>
      @endif
    </div>