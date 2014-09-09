@extends('includes.template')


@section('form')
 	{{@Form::open(array('url'=> 'users')) class=>'cmxform' id=>'login-form'}}
            <h2 class="form-header">Register</h2>

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

                {{Form::label('password_confirmation','Confirm Password')}}
                <p>
                    <span><i class="fa fa-lock"></i></span>      
                    {{Form::password('password_confirmation')}}
                    {{$errors->first('password_confirmation','<p class="error">:message</p>')}}
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
                    {{$errors->first('lastname','<p class="error">:message</p>')}
                </p>
                 {{Form::label('email','Email')}}
                <p>
                    <span><i class="fa fa-envelope-o"></i></span>                   
                    {{Form::email('email')}}
                    {{$errors->first('email','<p class="error">:message</p>')}
                </p>
                {{Form::label('avatar','My Avatar')}}
                <p>
                    <span><i class="fa fa-instagram"></i></span>       
                    {{Form::file('avatar')}}
                    {{$errors->first('avatar','<p class="error">:message</p>')}
                </p>
				{{Form::reset('Reset') class=>"reset";}}
				{{Form::submit('Sign up') class=>"submit";}}
                </form>
{{Form::close()}}

@stop