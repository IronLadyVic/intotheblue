@extends('includes.form')
@section('form')

	{{Form::open(array('url'=> 'login', 'class'=>'cmxform', 'id'=>'login-form'))}}
	<h2 class="form-header">Login</h2>

	{{Form::label('username','Username')}}
	<p><span><i class="fa fa-user"></i></span>                    
		{{Form::text('username')}}
		{{$errors->first('username','<p class="error">:message</p>')}}
	</p>

	{{Form::label('password','Password')}}
	<p>
		<span><i class="fa fa-lock"></i></span>      
		{{Form::password('password')}}
		{{$errors->first('password','<p class="error">:message</p>')}}
	</p>

	{{Form::reset('Reset', array('class'=>'reset'))}}
	{{Form::submit('Login', array('class'=>'submit'))}}


{{Form::close()}}
{{Session::get("error")}}

<p class="edit"><a href="{{URL::to('users/new')}}" class="member">become a member</a></p>






@stop