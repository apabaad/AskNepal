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

 
 
<footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>
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
		@endif
</script>

</body>
</html>