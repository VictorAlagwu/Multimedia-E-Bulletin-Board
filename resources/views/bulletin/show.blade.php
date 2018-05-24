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
                </div>
            </div>
       
         {{-- @foreach ($replies as $reply)
                @include('threads.reply')
        @endforeach --}}
            {{-- {{$replies->links()}} --}}
        @if(auth()->check())
           <form method="POST" action="">
           {{  csrf_field()}}
           <div class="form-group">
            <textarea name="body" id="body" class="form-control" placeholder="Enter your reply..." rows="3"></textarea>
           </div>
           <button class="btn btn-default" type="submit">Post</button>
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
