@extends('includes.form')


@section('form')
            <h2 class="form-header">My details</h2>

                {{Form::label('username','Username')}}
                <p><span><i class="fa fa-user"></i></span>                    
                    {{{$user->username}}}
                </p>
                {{Form::label('firstname','First Name')}}
                <p>
                    <span><i class="fa fa-user"></i></span>                    
                    {{{$user->firstname}}}
                </p>
                {{Form::label('lastname','Last Name')}}
                <p>
                    <span><i class="fa fa-user"></i></span>                    
                    {{{$user->lastname}}}
                </p>
                 {{Form::label('email','Email')}}
                <p>
                    <span><i class="fa fa-envelope-o"></i></span>                   
                    {{{$user->email}}}
                </p>
                {{Form::label('avatar','My Avatar')}}
                <p>
                    <span><i class="fa fa-instagram"></i></span>       
                    {{{$user->avatar}}}
                </p>
				<p class="submit"><a href="{{URL::to('users/'.$user->id.'/edit')}}"></a>Edit my details</p>
                </form>

@stop