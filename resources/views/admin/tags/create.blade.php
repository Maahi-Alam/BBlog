@extends('layouts.admin')

@section('content')
    <h1>Create Tags</h1>


    @include('admin.includes.errors')

    {!! Form::open(['method'=>'post','route'=>'tag.store'])!!}

    <div class="form-group">
        {!! Form::label('name','Tag Name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}

    </div>


    <div class="form-group">

        {!! Form::submit('create Tag',['class'=>'btn btn-primary'])!!}

    </div>

    {!! Form::close()!!}





@endsection

@section('footer')
@endsection