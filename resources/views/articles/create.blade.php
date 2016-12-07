@extends('app') @section('content')
    <h1>撰写新文章</h1>
    {!! Form::open() !!}
            <div class="from-groups">
    {!! Form::label('name') !!}
    {!! Form::text('name',null,['class'=>'from-control']) !!}
            </div>
    {!! Form::close() !!}
@stop
