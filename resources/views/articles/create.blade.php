@extends('app') @section('content')
    <h1>撰写新文章</h1>
    {!! Form::open() !!}
            <div class="from-groups">
    {!! Form::label('name') !!}
    {!! Form::text('name',null,['class'=>'control']) !!}
            </div>
    {!! Form::close() !!}
            <!--<form action="">
        <dev class="body">
            <textarea name="textarea" id="" cols="30" rows="10">
                Dfdf
            </textarea>
        </dev>
    </form>
    -->
@stop
