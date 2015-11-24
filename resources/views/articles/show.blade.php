@extends('master')

@section('content')

	<h1>{{ $article->title }}</h1>
	<hr>

	<div class="body">
		{{ $article->body }}
	</div>
	
	@unless($article->tags->isEmpty())

	<h3>Tags:</h3>
	
	<ul>
	@foreach($article->tags as $tag)
		
		<li>{{ $tag->name }}</li>
		
	@endforeach
	@endunless
	</ul>

	<hr>
	<a href="{{url('/articles/' . $article->id . '/edit')}}">Edit this article</a>&nbsp;|&nbsp;

	<a href="#">Delete article</a>&nbsp;|&nbsp;
	
	<a href="/articles">Go back to articles</a>
	
@stop
