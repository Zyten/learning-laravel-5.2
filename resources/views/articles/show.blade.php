@extends('layouts.master')

@section('content')
	<article>
		<h1>{{ $article->title }}</h1>
		<div class="body">{{ $article->body }}</div>
	</article>
@stop