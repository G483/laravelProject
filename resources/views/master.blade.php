<!DOCTYPE html>
<html>
<head>
	@yield('header')
	<title>Page Title</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	@include('partials.flash')

	@yield('content')	

	<script>
	$(document).ready(function(){
		$('.alert-success').not('.alert-important').delay(3000).slideUp(300);
	});
	</script>

</div>

@yield('footer')

</body>

</html>