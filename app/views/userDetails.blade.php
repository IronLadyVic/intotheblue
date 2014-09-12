@extends('includes.form')


@section('form')
<div id="userDetails">
            <h2 class="form-header">My details</h2>

                {{Form::model($user, array('url'=> 'users/details'.$user->id, 'class'=>'cmxform', 'id'=>'detail-form', 'files'=>'true'))}}
                <!-- //form open will accept data and form model will not -->

                {{Form::label('username','Username')}}
                <p><span><i class="fa fa-user"></i></span>                    
                    {{Form::text('username',$user->username, array("disabled"=>"disabled"))}}
                </p>

                {{Form::label('firstname','First Name')}}
                <p>
                    <span><i class="fa fa-user"></i></span>                    
                    {{Form::text('firstname',$user->firstname, array("disabled"=>"disabled"))}}
                    
                </p>
                {{Form::label('lastname','Last Name')}}
                <p>
                    <span><i class="fa fa-user"></i></span>                    
                    {{Form::text('lastname',$user->lastname, array("disabled"=>"disabled"))}}
                    
                </p>
                 {{Form::label('email','Email')}}
                <p>
                    <span><i class="fa fa-envelope-o"></i></span>                   
                    {{Form::text('email',$user->email, array("disabled"=>"disabled"))}}
                    
                </p>
                {{Form::label('avatar','My Avatar')}}
                <p>
                    <span><i class="fa fa-instagram"></i></span>       
                    {{Form::text('avatar',$user->avatar,array("disabled"=>"disabled"))}}
                   
                </p>
            
                <p class="edit"><a href="{{URL::to('users/'.$user->id.'/edit')}}">Edit my details</a></p>
                
</div>


@stop



				
                
