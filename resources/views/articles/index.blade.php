@extends('app') @section('content')

<h1>Article</h1>
@if(count($article)!='0') 
@foreach($article as $key => $values)
<ul>
	<li>$values</li>
</ul>
@endforeach @entif @stop
