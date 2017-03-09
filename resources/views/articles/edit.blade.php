@extends('layouts.master')

@section('content')
	<h1>Edit: {{ $article->title }}</h1>
	
	<hr/>
	
	{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!} <!-- action/named routes can be used as well -->
		@include('articles._form', ['submitButtonText' => 'Update Article']) <!-- View Partial - can pass variable from here -->
	{!! Form::close() !!}

	@include('errors.list') <!-- View Partial -->
@stop