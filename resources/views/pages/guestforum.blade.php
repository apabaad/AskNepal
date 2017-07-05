<!-- comment adn see all the comments. -->
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
				<li><i class="glyphicon glyphicon-user"></i> {{$post->user->name}}</li>
			</ul>
		</div>
</div>

	@foreach($post->replies as $reply)
	<div class="media">
	 <div class="media-right">
		<div class="well well-sm">
	 		{{$reply->body}} 
	 		<ul class="list-inline">
				<li><i class="glyphicon glyphicon-user"></i>{{$reply->user->name}}</li>
	 		</ul>
		</div>
	</div>
	</div>
@endforeach

Please <a href="{{ route('login') }}"> login</a> to reply.
</div>
@endsection