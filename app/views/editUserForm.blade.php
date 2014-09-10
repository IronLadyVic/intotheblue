@extends('includes.form')


@section('form')
 	{{Form::model($user, array('url'=> 'users/'. $user->id, 'method'=>'put', 'class'=>'cmxform', 'id'=>'login-form'))}}
            <h2 class="form-header">Edit my details</h2>

                {{Form::label('username','Username')}}
                <p><span><i class="fa fa-user"></i></span>                    
                    {{Form::text('username',$user->username, array("disabled"=>"disabled"))}}
                    
                </p>
                {{Form::label('firstname','First Name')}}
                <p>
                    <span><i class="fa fa-user"></i></span>                    
                    {{Form::text('firstname')}}
                    {{$errors->first('firstname','<p class="error">:message</p>')}}
                </p>
                {{Form::label('lastname','Last Name')}}
                <p>
                    <span><i class="fa fa-user"></i></span>                    
                    {{Form::text('lastname')}}
                    {{$errors->first('lastname','<p class="error">:message</p>')}}
                </p>
                 {{Form::label('email','Email')}}
                <p>
                    <span><i class="fa fa-envelope-o"></i></span>                   
                    {{Form::email('email')}}
                    {{$errors->first('email','<p class="error">:message</p>')}}
                </p>
                {{Form::label('avatar','My Avatar')}}
                <p>
                    <span><i class="fa fa-instagram"></i></span>       
                    {{Form::file('avatar')}}
                    {{$errors->first('avatar','<p class="error">:message</p>')}}
                </p>
				
				
                {{Form::submit('Update details', array('class'=>'submit'))}}
                
{{Form::close()}}

@stop