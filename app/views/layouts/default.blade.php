<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	</head>
	<body>

			@include('includes/navigation')
			@include('includes/messages')
		<div class="container">
			@yield('content')
		</div>
	</body>
</html>