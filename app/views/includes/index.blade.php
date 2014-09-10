<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Into the blue</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
  	{{HTML::style('css/base.css')}}
  	{{HTML::style('css/skeleton.css')}}
	{{HTML::style('css/layout.css')}}
	<!-- {{HTML::style('css/form-main.css')}}
	{{HTML::style('css/form-normalize.css')}} -->
	
	<!-- ================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<img class="vics-image" src="{{URL::to('img/bluebyVictoriaClark.png')}}">
	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->
	
	<div class="container">
		<header>
				<div class="flex-brand wrap">
      				<ul>
        				<li><a href="{{URL::to('topics/1')}}"><img src="{{URL::to('img/into-the-blue.png')}}"></a></li>
     		 		</ul>
    			</div>
			<!-- <button id="navHandle"><i class="fa fa-bars fa-2x"></i></button> -->
			<nav>
				<ul class="group">
				@foreach(Topic::all() as $topic)
					<li><a href="{{URL::to('topics/'.$topic->id)}}">{{$topic->name}}</a></li>
          		@endforeach	
          			
				<!-- //if user is not a member do this -->
          			@if(Auth::guest())
          			<li><a href="{{URL::to('login')}}">login</a></li>
          			<li><a href="{{URL::to('users/new')}}">register</a></li>

          		<!-- //if user is a member do this -->	
          			@else
          			<li><a href="{{URL::to('compose')}}">compose</a></li>
          			<li><a href="{{URL::to('users/details')}}">account</a></li>
					<li><a href="{{URL::to('logout')}}">logout</a></li>
					@endif
          			
          			
          			<!-- <li><section class="author-images"><img src="" alt=""></section></li>
          			<li><p class="author">Vic your logged in</p></li> -->
				</ul>
			</nav>
		</header>
		

		<div class="main group">
		@yield('topic')

		</div>
<footer></footer>

</div><!-- container -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/main.js"></script>


<!-- End Document
================================================== -->
</body>
</html>