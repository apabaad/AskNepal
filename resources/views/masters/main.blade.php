<!DOCTYPE html>
<html>
<head>
	<title>Ask Nepal</title>
	<!-- <link rel="stylesheet" type="text/css" href="http://localhost/asknepal/public/css/bootstrap.css"> -->
	
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}"> 
</head>
<body>



@yield('content')

 
 
<!-- <footer class="footer">
     <p align="center">  © Copyright AskNepal 2017.</p>
</footer>
 -->


<script type="text/javascript">
		@if(notify()->ready())
			swal({
			title: "{!!notify()->message()!!}",
			type: "{{notify()->type()}}",
			//@if (notify()->option('timer'))

				timer: "{{notify()->option('timer')}}",
				//showConfirmButton: false,
			//@endif	
			html: true
			});
		
// 			swal({
//   title: "Are you sure?",
//   text: "You will not be able to recover this imaginary file!",
//   type: "warning",
//   showCancelButton: true,
//   confirmButtonColor: "#DD6B55",
//   confirmButtonText: "Yes, delete it!",
//   closeOnConfirm: false
// },
// function(){
//   swal("Deleted!", "Your imaginary file has been deleted.", "success");
// });

		@endif

</script>

<style type="text/css">
	/*.footer{
		width:100%; 
		float:left; 
		background:#F8F8F8; 
		height:25px;
	}*/
	.footer {
		  position: relative;  /*absolute, fixed*/
		  right: 0;
		  bottom: 0;
		  left: 0;
		  width: 100%;
		  background-color: #f5f5f5;
		  text-align: center;
		  height: 30px;
		  /*margin-top: -180px;*/
		  /*clear: both;*/
	}

	/*.footer {
  position: relative;
  margin-top: -180px;  negative value of footer height 
  height: 180px;
  clear: both;
} 	*/
.swal-wide{
    width:200px !important;
}
</style>

</body>
</html>