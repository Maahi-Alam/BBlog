@extends('layouts.admin')

@section('content')
      <h1>Create User</h1>


      @include('admin.includes.errors')

      {!! Form::open(['method'=>'post','route'=>'user.store'])!!}

      <div class="form-group">
            {!! Form::label('name','Nmae')!!}
            {!! Form::text('name',null,['class'=>'form-control'])!!}

      </div>

      <div class="form-group">
            {!! Form::label('email','Email')!!}
            {!! Form::email('email',null,['class'=>'form-control'])!!}

      </div>

      <div class="form-group">
            {!! Form::label('password','Password')!!}
            {!! Form::password('password',['class'=>'form-control'])!!}

      </div>


      <div class="form-group">

            {!! Form::submit('Create User',['class'=>'btn btn-primary'])!!}

      </div>

      {!! Form::close()!!}


@endsection

@section('footer')
@endsection
