
@extends('layouts.app')
@section('title', 'Home')
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
                        @if(is_null($bulletin->user->photo))
                          <img class="img-fluid" src="{{asset('images/profile/nopic.png')}}" alt="...">
                        @else
                          <img class="img-fluid"  src="{{asset('images/profile/'.$bulletin->user->photo)}}" alt="...">
                        @endif
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
                      <span class="num">{{$bulletin->posts->count()}}</span>
                      <span class="unit">{{ str_plural('Post',$bulletin->posts->count())}}</span>
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
@endsection
