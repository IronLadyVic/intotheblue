@extends('includes.form')

@section('form')
<div class="post">

<h2>{{$post->topic->name}}</h2>
	<article class="group">
	

		<img src="{{URL::to('blog-photos/'.$post->photo_path)}}" alt="post photo">
		<h4>{{$post->title}}</h4>
		<p>{{$post->content}}</p>

		<h4>comment</h4>

	{{Form::open(array('url'=> 'comments'))}}
	

		{{@Form::hidden("$post_id", $post->id)}}
		{{Form::textarea('content')}}

		
		{{$errors->first('content','<p class="error">:message</p>')}}

		<p>
		
		
		{{Form::submit('Post Comment', array('class'=>'post-comment'))}}
		</p>	

		{{Form::close()}}
	</article>
</div>		
@stop

