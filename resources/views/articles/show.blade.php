@extends('app') @section('content')

    <h1>{{$article->title}}</h1>
    <article>
        <div class="body"></div>
        {{$article->content}}
    </article>
@stop
