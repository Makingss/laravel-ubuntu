@extends('app') @section('content')
    <h1>撰写新文章</h1>
    {!! Form::open(['url'=>'/articles']) !!}
    <div class="form-groups">
        {!! Form::label('Title') !!}
        {!! Form::text('Title',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content','Content:') !!}
        {!! Form::textarea('content',null,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('发表文章',['class'=>'btn btn-primary form-control']) !!}
    {!! Form::close() !!}
@stop
