@extends('app') @section('content')

<h1>Article</h1>
@if(count($article)!='0') 
@forecho($article as $key => $values)
<ul>
	<li>$values</li>
</ul>
@endforecho @entif @stop
