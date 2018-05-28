@extends('layouts.app')

@section('content')
<div class="page bg-white">
        <!-- Forum Sidebar -->
      
  
        <!-- Forum Content -->
        <div class="page-main">
  
          <!-- Forum Content Header -->
          <div class="page-header">
            <h1 class="page-title">Welcome to Multimedia EBulletin Board</h1>
          </div>
  
          <!-- Forum Nav -->
          <div class="page-nav-tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="active nav-link" data-toggle="tab" href="#forum-newest" aria-controls="forum-newest"
                  aria-expanded="true" role="tab">Newest Bulletin Board</a>
              </li>
          
            </ul>
          </div>
  
          <!-- Forum Content -->
          <div class="page-content tab-content page-content-table nav-tabs-animate">
            <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
              <table class="table is-indent">
                <tbody>
                @foreach ($bulletins as $bulletin)
                  <tr data-url="panel.tpl" data-toggle="slidePanel">
                    <td class="pre-cell"></td>
                    <td class="cell-60 responsive-hide">
                      <a class="avatar" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../../global/portraits/1.jpg" alt="...">
                      </a>
                    </td>
                    <td>
                      <div class="content">
                        <div class="title">
                            <a style="text-decoration:none; color:grey;" href="{{route('bulletin', ['id' => $bulletin->id, 'slug' => $bulletin->slug])}}">{{$bulletin->title}}</a> 
                        </div>
                        <div class="metas">
                          <span class="author">By {{$bulletin->user->name}}</span>
                          <span class="started">{{$bulletin->created_at->diffForHumans()}}</span>
                        
                        </div>
                      </div>
                    </td>
                    <td class="cell-80 forum-posts">
                      <span class="num">1</span>
                      <span class="unit">Post</span>
                    </td>
                    <td class="suf-cell"></td>
                  </tr>
                  @endforeach
                 
                  
                </tbody>
              </table>
              ({{$bulletins->links('vendor.pagination.bootstrap-4')}})
            </div>
           
          </div>
        </div>
      </div>
  
      <!-- Site Action -->
      <div class="site-action" data-target="#addTopicForm" data-toggle="modal" data-plugin="actionBtn">
        <button type="button" class="site-action-toggle btn-raised btn btn-success btn-floating">
          <i class="icon md-edit" aria-hidden="true"></i>
        </button>
      </div>
      <!-- End Site Action -->
  
      <!-- Add Topic Form -->
      <div class="modal fade" id="addTopicForm" aria-hidden="true" aria-labelledby="addTopicForm"
        role="dialog" tabindex="-1">
        <div class="modal-dialog modal-simple">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
              <h4 class="modal-title">Create New Bulletin Board</h4>
            </div>
            @if (auth()->check())
            <form method="POST" action="/bulletins" enctype="multipart/form-data">
              {{ csrf_field()}}
            <div class="modal-body container-fluid">
              
                <div class="form-group">
                  <label class="form-control-label mb-15" for="topicTitle">Bulletin Board Title:</label>
                  <input type="text" class="form-control" id="topicTitle" name="title" placeholder="Enter Bulletin Board Title" />
                </div>
                <div class="form-group">
                  <label class="form-control-label mb-15" for="topicSubject">Bulletin Board Subject:</label>
                  <textarea name="subject" class="summernote" data-iconlibrary="fa" rows="10"></textarea>
                </div>
                <label class="btn btn-success btn-file" for="my-file-selector">
                    <input id="my-file-selector" name="file" type="file" style="display:none" 
                    onchange="$('#upload-file-info').html(this.files[0].name)">
                    Upload <i class="icon md-upload" aria-hidden="true"></i>
                </label>
                <span class='label label-info' id="upload-file-info"></span>
               
             
            </div>
            <div class="modal-footer text-left">
              <button class="btn btn-primary" data-dismiss="modal" name="submit" type="submit">Create</button>
              <a class="btn btn-sm btn-white btn-flat" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                  @if(count($errors))
                      <ul class="alert alert-danger">
                          @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                   @endif
            </div>
          </form>
            @else
            <div class="modal-body container-fluid">
              <p>Please <a href="{{route('login')}}">Sign-In</a> to create a new bulletin board</p>
            </div>
            @endif
          </div>
        </div>
      </div>
      <!-- End Add Topic Form -->
@endsection
