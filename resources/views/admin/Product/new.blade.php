@extends('Layouts.backend')

@section('content')

<div class="container">
  <h3>Create New Product</h3>

  <hr/>

  {{-- error --}}
  @if ($errors->has())
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p>The following errors are occurred:</p>
    <ul class="">
      @foreach ($errors->all() as $error)
      <li class="">{!! $error !!}</li>
      @endforeach
    </ul>
  </div>
  @endif
  {{-- end error --}}

  {{-- create category  --}}
  <div>
    {!! Form::open(array('url' => 'admin/product/create', 'class' => '', 'files' => true)) !!}
    <div class="form-group">
      <div class="form-group">
        {!! Form::Label('title', 'Product title', array('sr-only')) !!}
        {!! Form::text('title', Input::old('title'), array('placeholder' => 'Input new product title', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('category_id', 'Product Category', array('sr-only')) !!}
        {!! Form::select('category_id', $categories, null, array('class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('description', 'Product Description', array('sr-only')) !!}
        {!! Form::textarea('description', Input::old('description'), array('placeholder' => 'Input new product description', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('price', 'Product Price', array('sr-only')) !!}
        {!! Form::text('price', Input::old('price'), array('placeholder' => 'Input new product price', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('discount', 'Product Discount', array('sr-only')) !!}
        {!! Form::text('discount', Input::old('discount'), array('placeholder' => 'Input new product discount', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('stock', 'Product Stock', array('sr-only')) !!}
        {!! Form::text('stock', Input::old('stock'), array('placeholder' => 'Input new product stock', 'class' => 'form-control')) !!}
      </div>
      
      <div class="form-group">
        {!! Form::Label('availability', 'Availability', array('sr-only')) !!}
        {!! Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), 1, array('class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('image', 'Product Image', array('sr-only')) !!}
        {!! Form::file('image') !!}
      </div>

      {!! Form::submit('Create Product', array('class' => 'btn btn-default', 'name' => 'submit')) !!}


    </div>
    {!! Form::close() !!}
  </div>
  {{-- end create category  --}}

  <hr/>

</div>

@endsection