@extends('app') @section('content')

<h1>Article</h1>
@foreach($article as $key => $values)
	<h2><a href="/article/{{$values->id}}">{{$values->title}}</a></h2>
	<article>
	<div class="body"></div>
	{{$values->content}}
	</article>
@endforeach @stop
