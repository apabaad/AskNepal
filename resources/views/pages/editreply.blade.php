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
			</ul>
		</div>
</div>
<form method="get" id="form" action="updatereply" enctype="multipart/form-data" class="form-horizontal">

<div class="form-group">
	 <div class="col-md-6">
           <textarea id="reply" placeholder="Type your reply here..." class="form-control" name="reply" rows="3" required autofocus>{{$reply->body}}</textarea>
 </div>
  
  </div>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <input type="hidden" name="postid" value="{{$post->id}}">
	<input type="hidden" name="replyid" value="{{$reply->id}}">
  <!-- for saving reply in current post -->
 </form>

</div>

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