@extends('includes.template')

@section('form')

<!-- If your form is going to accept file uploads, add a files option to your array: -->
	{{@Form::open(array('url'=> 'posts/create', 'method'=>post)) class=>'cmxform' id=>'login-form'}} 
	<form class="cmxform"  id="login-form" method="get" action="">
		<h2 class="form-header">Compose here</h2>            
		<p>
			<span class="icon1"><i class="fa fa-thumbs-o-up"></i></span>
			{{Form::label('topic_id','choose a topic');}}
			{{Form::select('topic_id','$topic');}}
			<!-- //$errors is already in laravel documentation it is returning the first error created by user-->
			{{$errors->first('topic_id','<p class="error">:message</p>');}}	
		</p>


		<p>
			<span><i class="fa fa-pencil-square"></i></span>
			{{Form::label('title','choose a title');}}    
			{{Form::text('title','Title');}}
			<!-- //$errors is already in laravel documentation -->
			{{$errors->first('title','<p class="error">:message</p>');}}
		</p>


		{{Form::label('photo_path','choose your pic');}}  
		<p><span><i class="fa fa-camera"></i></span>
			{{Form::file('photo_path','photo');}}
			<!-- //$errors is already in laravel documentation -->
			{{$errors->first('photo_path','<p class="error">:message</p>');}}                          
		</p>


		<p>
			{{Form::label('content','start writing your blog here');}}
			{{Form::textarea('content');}}
			<!-- //$errors is already in laravel documentation -->
			{{$errors->first('photo_path','<p class="error">:message</p>');}}
		</p>

		{{Form::reset('Reset') class=>"reset";}}
		{{Form::submit('Submit post') class=>"submit";}}

	</form>
	

{{Form::close()}}



@stop