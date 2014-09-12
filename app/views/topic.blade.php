@extends('includes.index')

@section('topic')

<h2>{{$topic->name}}</h2>
	@foreach($topic->posts as $post)
			<article class="group">
				<img src="{{URL::to('blog-photos/'.$post->photo_path)}}" alt="post photo">
				<h4>{{$post->title}}</h4>
				<p>{{substr($post->content, 0, 170)}}....</p>
				<span>
				<a href="{{URL::to('posts/'.$post->id)}}">
				{{Form::button('read more');}}</a>	
				{{@Form::hidden("$postID", $post->id)}}</a>
				</span>	
			</article>
	@endforeach
		
@stop

<!-- not sure whether to use the URL as posts/comment???? -->