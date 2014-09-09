@extends('includes.index')

@section('topic')

<h2>{{$topic->name}}</h2>
	@foreach($topic->posts as $post)
			<article class="group">
				<img src="{{URL::to('blog-photos/'.$post->photo_path)}}" alt="">
				<h4>{{$post->title}}</h4>
				<p>{{$post->content}}</p>
				<span>
				{{Form::label('');}}
				{{Form::button('read more');}}	
				{{@Form::hidden("$postID", $post->id)}}
				</span>
				<span>
				{{Form::label('');}}
				{{Form::button('comment');}}
				{{@Form::hidden("$commentID", $comment->id)}}	
				</span>			
			</article>
	@endforeach
		
@stop