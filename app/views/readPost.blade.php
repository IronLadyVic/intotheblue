@extends('includes.index')

@section('form')
<div class="post">

<h2>{{$topic->name}}</h2>
	<article class="group">
		<img src="{{URL::to('blog-photos/'.$post->photo_path)}}" alt="post photo">
		<h4>{{$post->title}}</h4>
		<p>{{$post->content}}</p>
		<h4>comment</h4>
		{{Form::open(array('url'=> 'comments')) }}

		{{Form::textarea('comment')}}

		{@Form::hidden("$commentID", $comment->id)}}

		<p>
		{{Form::hidden("$postID", $post->id)}}
		{{Form::submit('Post Comment', array('class'=>"post-comment"))}}
		</p>	

		{{Form::close()}}
	</article>
</div>		
@stop

