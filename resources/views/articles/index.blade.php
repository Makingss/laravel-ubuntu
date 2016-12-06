@extends('app') @section('content')

<h1>Article</h1>
	@foreach($article as $key => $values)
	<ul>
	<li>{{$values}}</li> 
	</ul>
	@endforeach

@stop
