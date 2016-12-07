@extends('app') @section('content')
    <h1>Create Article</h1>
    {!! Form::open() !!}
    {!! Form::lable('name') !!}
    {!! Form::text('name') !!}
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
