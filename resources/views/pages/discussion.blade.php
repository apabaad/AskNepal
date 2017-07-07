	<!--  see post and all the comments. -->
@extends('masters.main')
@section('content')
@include('layouts.mainnav')

<div class="container">
	

	<div class="media">
		<div class="well well-sm">
			<h4 class="media-heading">{{$post->title}}</h4>
			<p>{{$post['question']}}</p>
			<ul class="list-inline">
				<li><i class="glyphicon glyphicon-time"></i> {{$post->created_at->diffForHumans()}}</li>
				<li>|</li>
				<li><a href="{{url('user/profile/' . $post->user_id)}}"><i class="glyphicon glyphicon-user"></i> {{$post->user->name}}</a></li>
				
				@if(Auth::user()->id == $post->user_id)
				<li>|</li>
				<li><a href="{{url("discussionpost/delete/$post->id")}}"><i class="glyphicon glyphicon-trash"></i></a></li>
				<li>|</li>	
				<li><a href="{{url("post/edit/$post->id")}}">Edit</a></li>
				<li>|</li>
				@endif
			</ul>
		</div>
</div>
@if(Auth::user())

<form method="post" action="{{url('savereply')}}" name="form" id="form" enctype="multipart/form-data" class="form-horizontal">

<div class="form-group">
	 <div class="col-md-6">
           <textarea id="reply" placeholder="Type your reply here..." class="form-control" 	name="reply" rows="3" required ></textarea>
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
				<li><a href="{{url('user/profile/' . $reply->user->id)}}"> <i class="glyphicon glyphicon-user"></i> {{$reply->user->name}}</a></li>
				
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

<style type="text/css">
a
{
   color:black;
   text-decoration: none; 
   background-color: none;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
    $('#reply').keypress(function(e){
      if(e.which == 13 && !e.shiftKey){
           $('#form').submit();
       }
    });
});
</script>

@endsection

