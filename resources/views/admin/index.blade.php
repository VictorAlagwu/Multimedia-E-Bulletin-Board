@extends('layouts.admin')
@section('content')
    <!-- Page -->
    <div class="page">
      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          <div class="col-xxl-5 col-lg-12">
            <!-- Panel Projects -->
            <div class="panel" id="projects">
              <div class="panel-heading">
                <h3 class="panel-title">Projects</h3>
              </div>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td>ID</td>
                      <td>User</td>
                      <td>Date</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($details as $detail)
                    <tr>
                    <td>{{$detail->id}}</td>
                    <td>{{$detail->name}}</td>
                    <td>Jan 1, 2017</td>
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
                          <td>User</td>
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
        </div>
      </div>
    </div>
    <!-- End Page -->
@endsection

