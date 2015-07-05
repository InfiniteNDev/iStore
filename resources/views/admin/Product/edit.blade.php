@extends('Layouts.backend')

@section('content')

<div class="container">
  <h3>Edit Product</h3>

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
    {!! Form::open(array('url' => 'admin/product/update', 'class' => '', 'files' => true)) !!}
    <div class="form-group">
      {!! Form::hidden('id', $product->id) !!}

      <div class="form-group">
        {!! Form::Label('title', 'Product title', array('sr-only')) !!}
        {!! Form::text('title', $product->title, array('placeholder' => 'Input new product title', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('category_id', 'Product Category', array('sr-only')) !!}
        {!! Form::select('category_id', $categories, $product->category_id, array('class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('description', 'Product Description', array('sr-only')) !!}
        {!! Form::textarea('description', $product->description, array('placeholder' => 'Input new product description', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('price', 'Product Price', array('sr-only')) !!}
        {!! Form::text('price', $product->price, array('placeholder' => 'Input new product price', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('discount', 'Product Discount', array('sr-only')) !!}
        {!! Form::text('discount', $product->discount, array('placeholder' => 'Input new product discount', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('stock', 'Product Stock', array('sr-only')) !!}
        {!! Form::text('stock', $product->stock, array('placeholder' => 'Input new product stock', 'class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('availability', 'Availability', array('sr-only')) !!}
        {!! Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), 1, array('class' => 'form-control')) !!}
      </div>

      <div class="form-group">
        {!! Form::Label('image', 'Product Image', array('sr-only')) !!}
        <div>
        {!! HTML::image($product->image, $product->title, array('class' => 'img-rounded', 'height' => '200')) !!}
        </div>
        <hr/>
        {!! Form::file('image', array('class' => 'form-group')) !!}
      </div>

      {!! Form::submit('Update', array('class' => 'btn btn-primary', 'name' => 'submit')) !!}

    </div>
    {!! Form::close() !!}
  </div>
  {{-- end create category  --}}

</div>

@endsection