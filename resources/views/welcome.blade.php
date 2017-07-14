<!-- page before login -->
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

	@forelse($posts as $key => $post)
	<div class="well well-sm ">
		<div class="media">
			<h4 class="media-heading"><a href="{{url("asknepal/guestforum/$post->slug")}}">{{$post->title}}</a></h4>
			<p>{{$post['question']}}</p>
			<ul class="list-inline">
				<li><i class="glyphicon glyphicon-time"></i> {{$post->created_at->diffForHumans()}}</li>
				<li>|</li>
				<li><i class="glyphicon glyphicon-user"></i> {{$post->user->name}}</li>
				<li>|</li>
				<li> <a href="{{url("asknepal/guestforum/$post->slug")}}"><!-- Comments icon by Icons8 -->
<img class="icon icons8-Comments" width="20" height="20" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAABE0lEQVRIS+2W4VECMRSEPypQKlAqACrQDpAOaMEKgAqkE7QDqQA7ECoAK9D5nITJMM5BQuTX7a9MLrebt+/m7XW4EjpB5x54AQaA6xrYAB/AM7BRSOI1cFuD/Q+OPTBU6BUYASvgCfBBDXhxuR+AN4UkvgG6FUXiRRXbReu+w27sV41qUo5ffslboVxrW+tyHTucb6273Lr/HEEO7E9gmw7Vd2Bccd4555bAYxyqqpobDtZjuD8Mm677BQZ+GUVp8C1C8N0dkVml8HY52IYCJrrUNLFnwNSyA7uZNQfcz0aTUGxkStozW7JVQkw0vRfT1zNWZgIX4VTYSRx7Y68ULsIpIUn92oR/SMU4R6iYPH3xakI/d7g+YLOP5/EAAAAASUVORK5CYII="></a>

			
			
				{{$post->replies->count()}}
			
				</li>
			</ul>		
		</div>
	</div>

	@empty
	No any questions. Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to ask.
@endforelse
{{$posts->links()}}
</div>
