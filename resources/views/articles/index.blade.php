@extends('app') @section('content')

<h1>Article</h1>
@foreach($article as $key => $values)
<ul>
	<li>{{$values->title}}</li>
	<li>{{$values->content}}</li>
	<li>{{$values->published_at}}</li>
</ul>
@endforeach @stop
