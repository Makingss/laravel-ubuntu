@extends('layouts.app') @section('content')

    <h1>{{$article->title}}</h1>
    <article>
        <div class="body"></div>
        {{$article->content}}
    </article>
    <button type="button" class="btn btn-default btn-link">
        <span class="glyphicon glyphicon-pencil"></span>修改文章
    </button>
@stop
