@extends('layouts.master')

@section('content')
	<article>
		<h1>{{ $article->title }}</h1>
		<div class="body">{{ $article->body }}</div>
	</article>
	
	@unless ($article->tags->isEmpty())
	<h5>Tags:</h5>
	<ul>
		@foreach($article->tags as $tag)
			<li>{{ $tag->name }}</li>
		@endforeach
	</ul>
	@endunless
@stop