@extends('app') @section('content')
    <h1>撰写新文章</h1>
    {!! Form::open() !!}
            <div class="form-groups">
    {!! Form::label('Title') !!}
    {!! Form::text('Title',null,['class'=>'form-control']) !!}
            </div>
    {!! Form::close() !!}
@stop
