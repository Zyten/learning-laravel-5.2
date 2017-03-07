@extends('layouts.master')

@section('content')
	<h1>Articles</h1>

	@foreach($articles as $article)
		<article>
			<h2>
				<!-- Basic -->
				<a href="/articles/{{$article->id}}"></a>
				<!-- Using url fx -->
				<a href="{{ url('articles', $article->id) }}">{{$article->title }}</a>
				<!-- Using controller action -->
				<a href="{{ action('ArticlesController@show', $article->id)}}"></a>
			</h2>

			<div class="body">{{ $article->body }}</div>
		</article>
	@endforeach
@stop	