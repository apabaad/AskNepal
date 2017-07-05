@extends('masters.main')
@section('content')
@include('layouts.mainnav')
<div class="container">

<div class="row">
	<img src="{{ asset('uploads/avatars/'.$user->avatar) }}" style="width:150px; height:150px; border-radius:50%; float:left; margin-right:25px">
	<h2>{{$user->name}}</h2>
</div>
@if(Auth::user()->id == $user->id)
<form method="post" action="UpdateAvatar" enctype="multipart/form-data">
	<div class="form-group"
	<label>Update profile image.</label>
	<input type="file" class="" name="avatar">
	</div>
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" class="btn btn-sm btn-primary" name="sumbit">
	</div>
</form>
@endif
<div class="row"> 
@foreach($posts as $post)
{{$post->title}}
@endforeach
</div>
</div>
@endsection