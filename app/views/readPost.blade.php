@extends('includes.index')

@section('topic')

<h2>{{$topic->name}}</h2>
	@foreach($topic->posts as $post)
			<article class="group">
				<img src="{{URL::to('blog-photos/'.$post->photo_path)}}" alt="">
				<h4>{{$post->title}}</h4>
				<p>{{$post->content}}</p>
				<span>
				{{Form::label('Comment');}}
				{{Form::textarea('comment');}}
				{{@Form::hidden("$commentID", $comment->id)}}	
				</span>
				<textarea class="textarea_comment"></textarea>			
			</article>
	@endforeach

<!-- 	1. I want to see a post - with image etc, with a button that says comment
	2.  comment redirects to same page with a text area to comment in-->

<!-- 	{{Form::open(array('url'=> 'comments', 'class'=>'cmxform', 'id'=>'login-form')) }}	
	{{Form::hidden("$postID", $post->id)}}	
	{{Form::close()}} -->
	
		
@stop