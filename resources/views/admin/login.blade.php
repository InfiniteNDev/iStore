@extends('Layouts.backend')

@section('content')
<div class="container">
  {!! Form::open(array('url' => 'admin/login', 'method' => 'post', 'class' => 'backend-login')) !!}
  <div class="row">
  <div class="col-sm-12 col-md-4 col-lg-4 col-md-offset-4 col-lg-offset-4">  
      <h3 class="text-center">BackEnd Login</h3>

      <!-- if there are login errors, show them here -->
      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          {!! $errors->first('username') !!}
          {!! $errors->first('password') !!}
        </div>
      @endif

      {{-- username --}}
      <div class="form-group">
        <div class="row">
          <div class="col-sm-12 col-md-3 col-lg-3">
            {!! Form::label('username', 'Username', array('class' => 'control-label')) !!}
          </div> 
          <div class="col-sm-12 col-md-9 col-lg-9">
            {!! Form::text('username', Input::old('username'), array('placeholder' => 'Input username', 'class' => 'form-control')) !!}
          </div> 
        </div>
      </div>

      {{-- password --}}
      <div class="form-group ">
        <div class="row">
          <div class="col-sm-12 col-md-3 col-lg-3">
            {!! Form::label('password', 'Password', array('class' => '')) !!}
          </div> 
          <div class="col-sm-12 col-md-9 col-lg-9">
            {!! Form::password('password', array('placeholder' => 'Input password', 'class' => 'form-control')) !!}
          </div> 
        </div>
      </div>

      {{-- submit button --}}
      {!! Form::submit('Submit!', array('class' => 'btn btn-default')) !!}

    </div>
  </div>
</div>

{!! Form::close() !!}
</div>

@endsection