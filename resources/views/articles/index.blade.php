@extends('app') @section('content')

<h1>Article</h1>
@foreach($article as $key => $values)
	<h2>{{$values->title}}}</h2>
	<article>
	<div class="body"></div>
	{{$values->content}}
	</article>
@endforeach @stop
