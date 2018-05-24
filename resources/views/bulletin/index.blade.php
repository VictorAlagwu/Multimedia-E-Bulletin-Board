@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Multimedia E-Bulletin Board</div>

                <div class="panel-body">
                    @foreach ($bulletins as $bulletin)
                        <article>
                            <div class="level">
                                <h4 class="flex"><a href="{{route('bulletin', ['id' => $bulletin->id, 'slug' => $bulletin->slug])}}">{{$bulletin->title}}</a>
                                    <span style="float:right;"> created {{$bulletin->created_at->diffForHumans()}}</span>
                                </h4>
                            </div>
                        </article>
                    <hr>
                    @endforeach
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
