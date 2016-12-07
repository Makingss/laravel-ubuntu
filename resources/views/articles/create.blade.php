@extends('app') @section('content')
    <h1>撰写新文章</h1>
    {!! Form::open() !!}
            <div class="form-group">
    {!! Form::label('Title') !!}
    {!! Form::text('Title',null,['class'=>'form-control']) !!}
            </div>
    <div class="form-group">
        {!! Form::label('content','Content:') !!}
        {!! Form::textarea('content',null,'form-controls') !!}
    </div>
    {!! Form::close() !!}
@stop
