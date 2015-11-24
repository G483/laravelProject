@extends('master')

@section('content')

<h1>Articles</h1>
<hr>

@if(isset($articles))

	@foreach($articles as $article)

		<article>
				
			<h2><a href="{{ url('articles', $article->id) }}"> {{ $article->title }}</a></h2>
			
			<div class="body">{{ $article->body }}</div>

		</article>
		<hr>
	@endforeach
<a href="articles/create">Add new Article</a>
@endif

@stop