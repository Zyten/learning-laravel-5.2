@extends('layouts.master')

@section('content')
	<h1>Write a New Article</h1>
	
	<hr/>
	
	{!! Form::open(['url' => 'articles']) !!} <!-- action/named routes can be used as well -->
		@include('articles._form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}

	@include('errors.list')
@stop