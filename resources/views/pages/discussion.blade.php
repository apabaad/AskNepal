<!-- comment adn see all the comments. -->
@extends('masters.main')
@section('content')
@include('layouts.mainnav')
<style type="text/css">
a
{
   color:black;
   text-decoration: none; 
   background-color: none;
}
</style>

<div class="container">


	<div class="media">
		<div class="well well-sm">
			<h4 class="media-heading">{{$post->title}}</h4>
			<p>{{$post['question']}}</p>
			<ul class="list-inline">
				<li><i class="glyphicon glyphicon-time"></i> {{$post->created_at->diffForHumans()}}</li>
				<li>|</li>
				<li><i class="glyphicon glyphicon-user"></i> {{$post->user->name}}</li>
				<li>|</li>
				@if(Auth::user()->id == $post->user_id)
				<li><a href="{{url("discussionpost/delete/$post->id")}}"><i class="glyphicon glyphicon-trash"></i></a></li>
				<li>|</li>	
				<li><a href="{{url("post/edit/$post->id")}}">Edit</a></li>
				<li>|</li>
				@endif
			</ul>
		</div>
</div>
@if(Auth::user())

<form method="post" action="{{url('savereply')}}" enctype="multipart/form-data" class="form-horizontal">

<div class="form-group">
	 <div class="col-md-6">
           <textarea id="reply" placeholder="Type your reply here..." class="form-control" name="reply" rows="3" required autofocus></textarea>
    		<div class="col-md-4">
    		<input type="submit" value="Reply" class="form-control btn-default" >
      </div>  
 </div>
  
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="postid" value="{{$post->id}}"> <!-- fffor saving reply in current post -->
 </form>
 
 @endif

	@foreach($post->replies->sortByDesc('created_at') as $reply)
	<input type="hidden" name="replyid" value="{{$reply->id}}">
	<div class="media">
	 <div class="media-right">
		<div class="well well-sm">
	 		{{$reply->body}} 
	 		<ul class="list-inline">
	 			<li><i class="glyphicon glyphicon-time"></i>{{$reply->created_at->diffForHumans()}}</</li>
	 			<li>|</li>
				<li><i class="glyphicon glyphicon-user"></i></li><li>{{$reply->user->name}}</li>
				<li>|</li>
				@if(Auth::user()->id == $reply->user_id)
					<li><a href="{{url("deletereply/$reply->id")}}"><i class="glyphicon glyphicon-trash"></i></a></li>

					<li>|</li>	
					<li>
					<form method="post" action="{{url('editreply')}}" enctype="multipart/form-data" class="form-horizontal">
					<input type="submit" name="editreply" value="Edit">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="postid" value="{{$reply->post->id}}">
					<input type="hidden" name="replyid" value="{{$reply->id}}">

					</form></li>
					<li>|</li>
				@endif
	 		</ul>
		</div>
	</div>
	</div>
@endforeach

</div>
@endsection