@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a New Bulletin Board</div>

                <div class="panel-body">
                @if (auth()->check())
            
                    <form method="POST" action="/bulletins">
                    {{ csrf_field()}}
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Bulletin Board Title..."  />
                    </div>
                        <div class="form-group">
                            <label class="form-label">Bulletin Board Subject</label>
                            <textarea class="form-control summernote" name="subject" id="subject" rows="20" placeholder="Enter Bulletin Board Subject..."></textarea>
                        </div>
                        <button class="btn btn-default" type="submit" name="submit">Create New Bulletin Board</button>
                        @if(count($errors))
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
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
