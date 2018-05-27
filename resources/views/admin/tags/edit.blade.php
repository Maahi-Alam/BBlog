@extends('layouts.admin')

@section('content')


    <h1>Edit Tag</h1>


    <div class="col-sm-12">

        {!! Form::model($tag, ['method'=>'put', 'route'=> ['tag.update',$tag->id]]) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update Tag', ['class'=>'btn btn-primary col-sm-6 ']) !!}
        </div>
        {!! Form::close() !!}


        {!! Form::open(['method'=>'DELETE', 'route'=> ['tag.delete',$tag->id]]) !!}


        <div class="form-group">
            {!! Form::submit('Delete Tag', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::close() !!}



    </div>





@endsection

@section('footer')
