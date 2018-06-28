@extends('layouts.admin')
@section('content')
    <!-- Page -->
    @if(\Session::has('error'))
<div class=”alert alert-danger”>
{{\Session::get('error')}}
</div>
@endif
    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xxl-5 col-lg-12">
            <!-- Panel Projects -->
            <div class="panel" id="projects">
              <div class="panel-heading">
                <h3 class="panel-title">Registered Users</h3>
              </div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td>ID</td>
                      <td>User</td>
                      <td>Registeration Date</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $detail)
                    <tr>
                    <td>{{$detail->id}}</td>
                    <td>{{$detail->name}}</td>
                    <td>{{$detail->created_at->diffForHumans()}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                            data-toggle="tooltip" data-original-title="Edit">
                            <i class="icon md-wrench" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                            data-toggle="tooltip" data-original-title="Delete">
                            <i class="icon md-close" aria-hidden="true"></i>
                        </button>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- End Panel Projects -->
          </div>
          <div class="col-xxl-5 col-lg-12">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                  <div class="panel-heading">
                    <h3 class="panel-title">Bulletin Board</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <td>ID</td>
                          <td>Bullentin Board Title</td>
                          <td>Date</td>
                          <td>Actions</td>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($bulletins as $bulletin)
                        <tr>
                        <td>{{$bulletin->id}}</td>
                        <td><a href="{{route('admin/bulletin', ['id' => $bulletin->id])}}">{{$bulletin->title}}</a></td>
                        <td>Jan 1, 2017</td>
                        <td>
                            <a class="btn btn-sm btn-icon btn-pure btn-default"
                                data-toggle="tooltip" data-original-title="Edit" href="{{route('bulletin/edit', ['id'=>$bulletin->id,'slug'=>$bulletin->slug])}}">
                                <i class="icon md-wrench" aria-hidden="true"></i>
                        </a>
                            <form method="POST" action="{{route('admin/bulletin', $bulletin->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-sm btn-icon btn-pure btn-default"
                                        data-toggle="tooltip" data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                              </form>
                            
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- End Panel Projects -->
              </div>
        </div>
      </div>
    </div>
    <!-- End Page -->
@endsection

