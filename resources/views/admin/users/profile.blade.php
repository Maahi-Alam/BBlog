@extends('layouts.admin')

@section('content')
      <h1>Update profile User</h1>


      @include('admin.includes.errors')



      {!! Form::model($user,['method'=>'post', 'route'=> ['user.profile.update','files'=>true]]) !!}

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
            {!! Form::label('avatar','Avatar')!!}
            {!! Form::file('avatar',null,['class'=>'form-control'])!!}

      </div>

      <div class="form-group">
            {!! Form::label('facebook','Facebook ID')!!}
            {!! Form::text('facebook',null,['class'=>'form-control'])!!}

      </div>

      <div class="form-group">
            {!! Form::label('youtube','Youtube ID')!!}
            {!! Form::text('youtube',null,['class'=>'form-control'])!!}

      </div>

      <div class="form-group">
            {!! Form::label('about','About You')!!}
            {!! Form::text('about',null,['class'=>'form-control'])!!}

      </div>


      <div class="form-group">

            {!! Form::submit('Create User',['class'=>'btn btn-primary'])!!}

      </div>

      {!! Form::close()!!}





@endsection

@section('footer')
@endsection