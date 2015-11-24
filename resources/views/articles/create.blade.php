@extends('master')

@section('content')

<h1>Add Articles</h1>
<hr>

	{!! Form::open(['url' => 'articles'])  !!}

		@include('articles.form', ['submitButtonText' => 'Add new Article'])

	{!! Form::close() !!}

@include('errors.list')

@stop