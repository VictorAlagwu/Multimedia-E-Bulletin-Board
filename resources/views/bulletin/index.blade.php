@extends('layouts.app')

@section('content')
<div class="page bg-white">
        <!-- Forum Sidebar -->
      
  
        <!-- Forum Content -->
        <div class="page-main">
  
          <!-- Forum Content Header -->
          <div class="page-header">
            <h1 class="page-title">Getting Started</h1>
            <form class="mt-20" action="#" role="search">
              <div class="input-search input-search-dark">
                <input type="text" class="form-control w-full" placeholder="Search..." name="">
                <button type="submit" class="input-search-btn">
                  <i class="icon md-search" aria-hidden="true"></i>
                </button>
              </div>
            </form>
          </div>
  
          <!-- Forum Nav -->
          <div class="page-nav-tabs">
            <ul class="nav nav-tabs nav-tabs-line" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="active nav-link" data-toggle="tab" href="#forum-newest" aria-controls="forum-newest"
                  aria-expanded="true" role="tab">Newest</a>
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
              <ul class="pagination pagination-gap">
                <li class="disabled page-item"><a class="page-link" href="javascript:void(0)">Previous</a></li>
                <li class="active page-item"><a class="page-link" href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">5</a></li>
                <li class="page-item"><a class="page-link" href="javascript:void(0)">Next</a></li>
              </ul>
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
              <h4 class="modal-title">Create New Topic</h4>
            </div>
            <div class="modal-body container-fluid">
              <form>
                <div class="form-group">
                  <label class="form-control-label mb-15" for="topicTitle">Topic Title:</label>
                  <input type="text" class="form-control" id="topicTitle" name="title" placeholder="How To..."
                  />
                </div>
                <div class="form-group">
                  <textarea name="content" data-provide="markdown" data-iconlibrary="fa" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-sm-6">
                      <label class="form-control-label mb-15" for="topicCategory">Topic Category:</label>
                      <select id="topicCategory" data-plugin="selectpicker">
                        <option>PHP</option>
                        <option>Javascript</option>
                        <option>HTML</option>
                        <option>CSS</option>
                        <option>Ruby</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <label class="form-control-label mb-15" for="topic_tags">Topic Tags:</label>
                      <select id="topic_tags" data-plugin="selectpicker">
                        <option>PHP</option>
                        <option>Javascript</option>
                        <option>HTML</option>
                        <option>CSS</option>
                        <option>Ruby</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer text-left">
              <button class="btn btn-primary" data-dismiss="modal" type="submit">Create</button>
              <a class="btn btn-sm btn-white btn-flat" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
            </div>
          </div>
        </div>
      </div>
      <!-- End Add Topic Form -->
@endsection
