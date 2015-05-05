<!DOCTYPE HTML>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="{{Asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{Asset('assets/css/site.css')}}">
	<!--<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="{{Asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>-->

	  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="{{Asset('assets/js/jquery-validate/jquery.validate.js')}}"></script>


</head>
<body>
	<div class='containter'>
        @if(Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-warning">{{Session::get('error')}}</div>
        @endif
		@yield('content')
	 </div>
</body>
</html>