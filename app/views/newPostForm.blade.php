@extends('includes.form')

@section('form')

<!-- If your form is going to accept file uploads, add a files option to your array: -->
	{{Form::open(array('url'=> 'posts', 'class'=>'cmxform', 'id'=>'login-form', 'files'=>'true')) }}
	
		<h2 class="form-header">Compose here</h2>
		{{Form::label('topic_id','choose a topic')}}            
		<p>
			<span class="icon1"><i class="fa fa-thumbs-o-up"></i></span>
			
			{{Form::select('topic_id',$topics)}}
			<!-- //$errors is already in laravel documentation it is returning the first error created by user-->
			{{$errors->first('topic_id','<p class="error">:message</p>');}}	
		</p>

		{{Form::label('title','choose a title');}} 
		<p>
			<span><i class="fa fa-pencil-square"></i></span>			   
			{{Form::text('title','Title');}}
			<!-- //$errors is already in laravel documentation -->
			{{$errors->first('title','<p class="error">:message</p>');}}
		</p>


		{{Form::label('photo_path','choose your pic');}}  
		<p><span><i class="fa fa-camera"></i></span>
			{{Form::file('photo_path');}}
			<!-- //$errors is already in laravel documentation -->
			{{$errors->first('photo_path','<p class="error">:message</p>');}}                          
		</p>


		{{Form::label('content','start writing your blog here');}}
		<p>	
			{{Form::textarea('content');}}
			<!-- //$errors is already in laravel documentation -->
			{{$errors->first('photo_path','<p class="error">:message</p>');}}
		</p>

		{{Form::reset('Reset', array("class"=>"reset"))}}
		{{Form::submit('Submit post', array("class"=>"submit"))}}


	

{{Form::close()}}



@stop