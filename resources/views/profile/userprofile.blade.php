@extends('masters.main')
@section('content')
@include('layouts.mainnav')
<!-- <style type="text/css">
a
{
   color:black;
   text-decoration: none; 
   background-color: none;
}
</style>
 -->
<div class="container">
	<div class="col-md-3">
		<h2>{{$user->name}}</h2>
		<img src="{{ asset('uploads/avatars/'.$user->avatar) }}" style="width:150px; height:150px; border-radius:50%; float:left; margin-right:25px">
		@if(Auth::user()->id == $user->id)
		<form method="post" action="UpdateAvatar" enctype="multipart/form-data">
			<div class="form-group">
			<input type="file" name="avatar">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="submit" class="btn btn-sm btn-primary" name="sumbit">
			</div>
		</form>
		@endif
		</div>
<div class="col-md-9">

<h3>{{$firstname}}'s recent posts.</h3>
		@forelse($post as $posts)
		<h5><i class= "glyphicon glyphicon-book"></i><a href="{{url('asknepal/discussion/'. $posts->slug)}}"> {{$posts->title}} </a> {{$posts->created_at->diffforhumans()}}.</h5>
	@empty
	<h5>No posts yet.</h5>
	@endforelse
	<br><hr><br>
<h3>{{$firstname}}'s recent comments.</h3>
	@forelse($reply ->sortByDesc('created_at') as $replies)
	<h5> 
	<!-- <a href="{{url('user/profile/'. $replies->post->user->id)}}"> {{$firstname}}</a> commented  on</a>  -->

	 <img class="icon icons8-Comments" width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAABE0lEQVRIS+2W4VECMRSEPypQKlAqACrQDpAOaMEKgAqkE7QDqQA7ECoAK9D5nITJMM5BQuTX7a9MLrebt+/m7XW4EjpB5x54AQaA6xrYAB/AM7BRSOI1cFuD/Q+OPTBU6BUYASvgCfBBDXhxuR+AN4UkvgG6FUXiRRXbReu+w27sV41qUo5ffslboVxrW+tyHTucb6273Lr/HEEO7E9gmw7Vd2Bccd4555bAYxyqqpobDtZjuD8Mm677BQZ+GUVp8C1C8N0dkVml8HY52IYCJrrUNLFnwNSyA7uZNQfcz0aTUGxkStozW7JVQkw0vRfT1zNWZgIX4VTYSRx7Y68ULsIpIUn92oR/SMU4R6iYPH3xakI/d7g+YLOP5/EAAAAASUVORK5CYII="> <i> 

	 "{{$replies->body}}" </i> on <a href="{{url('user/profile/'. $replies->post->user->id)}}"> {{$replies->post->user->name}}</a>'s <a href="{{url('asknepal/discussion/'. $replies->post->slug)}}"> post</a> {{$replies->created_at->diffForHumans()}}.</h5>
	@empty
	<h5>No comments yet.</h5>

	@endforelse
</div>
</div>
</div>

@endsection