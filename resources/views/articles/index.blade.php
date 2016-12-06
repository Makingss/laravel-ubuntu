@extends('app') @section('content')

<h1>Article</h1>
@if(count($article)!='0')
<ul>
	@foreach($article as $key => $values)

	<li>{{$values}}</li> @endforeach
</ul>
@entif @stop
