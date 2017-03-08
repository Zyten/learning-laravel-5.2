@extends('layouts.master')

@section('content')
	<h1>Write a New Article</h1>
	
	<hr/>
	
	{!! Form::open(['url' => 'articles']) !!} <!-- action/named routes can be used as well -->
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class' => 'form-control', 'value' => 'bar']) !!} <!-- (name/id, value, anything else in an array) -->
		</div>

		<!-- Body Form Input -->
		<div class="form-group">
		    {!! Form::label('body', 'Body:') !!}
		    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Published_at Form Input -->
		<div class="form-group">
		    {!! Form::label('published_at', 'Publish On:') !!}
	    {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
		</div>

		<!-- Add Article Form Input -->
		<div class="form-group">
		    {!! Form::submit('Add Article', ['class' => 'btn btn-primary form-control']) !!}
		</div>
	{!! Form::close() !!}

	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif
@stop