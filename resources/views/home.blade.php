<!-- page after user logs in. -->
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
<!-- <div class="col-sm-6"> -->

@foreach($posts as $key => $post)

	<div class="well well-sm ">
		<div class="media">
			<h4 class="media-heading"><a target="" href="{{url("asknepal/discussion/$post->slug")}}"> 		{{ucfirst($post->title)}}</a>
			</h4>
			<!-- <div class="media-left">
    			<img src="{{'uploads/avatars/' . Auth::user()->avatar}}" class="media-object" style="width:40px; border-radius:50%">
 			</div> -->
			<p>{{$post['question']}}</p>
			<ul class="list-inline">
				<li><i class="glyphicon glyphicon-time"></i> {{$post->created_at->diffForHumans()}}</li>
				<li>|</li>
				<li><i class="glyphicon glyphicon-user"></i> <a href="{{url('user/profile/' . $post->user_id)}}"> {{$post->user->name}}</a></li>
				<li>|</li>
				@if(Auth::user()->id == $post->user_id)
				<li><a href="{{url("post/delete/$post->id")}}"><i class="glyphicon glyphicon-trash"></i></a></li>
				<li>|</li>
				<li><a href="{{url("post/edit/$post->id")}}">Edit</a></li>
				<li>|</li>
				@endif
				<li><a href="{{url("asknepal/discussion/$post->slug")}}">
					
					
					
	@if($post->replies->count()>1)
			<li><a href="{{url("asknepal/discussion/$post->slug")}}"> {{$post->replies->count()}} comments</a></li>
</a>
	@elseif($post->replies->count()==1)
			<li><a href="{{url("asknepal/discussion/$post->slug")}}">1 comment</a></li>

	@elseif($post->replies->count()<1)
			<li><a href="{{url("asknepal/discussion/$post->slug")}}">Be the first to reply.</a></li)>

	@endif	
				
			
				</li>
			</ul>	

		</div>
	</div>

@endforeach

<!-- {{$posts->appends(Request::all())->render()}} -->
{{$posts->links()}}

</li>
</ul>
</div>
</div>
</div>
<!-- </div> -->

@endsection