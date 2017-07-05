@extends('masters.main')

@section('content')
@include('layouts.mainnav')
@include('layouts.form-errors')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Ask</div>
                <div class="panel-body">

<form method="post" action="{{url('ask')}}" enctype="multipart/form-data" class="form-horizontal">

         
            

					<div class="form-group">
						<label for="title" class="col-md-4 control-label">Title</label>
 							<div class="col-md-6">
           						<input id="title" type="text" placeholder="title" class="form-control" name="title" required autofocus> 
     						</div>
					</div>

<div class="form-group">
 <label for="topic" class="col-md-4 control-label ">Topic</label>
 <div class="col-md-6">
           <select name="topic" class="form-control">

           		<option value="empty">-select-</option>
               <!-- <?php
                  foreach ($categories as $key => $category) { ?>
                    <option value="1"><?php echo "$category->Cname"  ?>  </option> <?php }
                ?> -->
                @foreach($categories as $key=> $category)
                <option value="{{$category->id}}">{{$category->Cname}}</option>
                @endforeach
           </select> 
  </div> 

</div>



<div class="form-group">
	<label for="topic" class="col-md-4 control-label">Question</label>
	 <div class="col-md-6">
           <textarea id="question" placeholder="type your question here..." class="form-control" name="question" rows="3" required autofocus></textarea>
           </div> </div>


<div class="form-group">
  <label for="image" class="col-md-4 control-label">   </label>
   <div class="col-md-6 control-label">
           <input type="file" name="image" id="image" class="form">
           </div> </div>

	<div class="form-group">
 <div class="col-md-8 col-md-offset-4">
<input type="submit" onclick="validate();" name="submit" value="save " id="submit" class="btn   btn-primary">
 <input type="button" onclick="window.location.href='home'" name="cancel" value="cancel " id="cancel" class="btn btn-danger">
</div>

<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</div>
</div>
</div>
</div>
</div>

@endsection