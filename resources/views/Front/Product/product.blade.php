@extends('Layouts.frontend')

@section('content')

<div class="container">
  <h3>Product: {!! $product->title !!}</h3>

  <hr/>
  
  {!! HTML::image(str_replace('public/', '', $product->image), $product->title, array('class' => 'img-rounded', 'height' => '200')) !!}

  {{-- create category  --}}
  <div>
    <div class="form-group">
      {!! Form::hidden('id', $product->id) !!}

      <div class="form-group">
        {!! Form::Label('title', 'Product title', array('sr-only')) !!}
        {!! $product->title !!}
      </div>

      <div class="form-group">
        {!! Form::Label('category_id', 'Product Category', array('sr-only')) !!}
        {!! $categories[$product->category_id] !!}
      </div>

      <div class="form-group">
        {!! Form::Label('description', 'Product Description', array('sr-only')) !!}
        {!! $product->description !!}
      </div>

      <div class="form-group">
        {!! Form::Label('price', 'Product Price', array('sr-only')) !!}
        {!! $product->price !!}
      </div>

      <div class="form-group">
        {!! Form::Label('discount', 'Product Discount', array('sr-only')) !!}
        {!! $product->discount !!}
      </div>

      <div class="form-group">
        {!! Form::Label('stock', 'Product Stock', array('sr-only')) !!}
        {!! $product->stock !!}
      </div>

      <div class="form-group">
        {!! Form::Label('availability', 'Availability', array('sr-only')) !!}
        {!! $availabilities[$product->availability] !!}
      </div>

      {{-- goto checkout --}}
      {!! Form::open(array('url' => '', 'method' => 'get')) !!}
      {!! Form::hidden('id', $product->id) !!}
      {!! Form::submit('Buy', array(
        'class' => 'btn btn-primary'
        )
        ) !!}
      {!! Form::close() !!}
        <br/>

      {{-- add to cart --}}
      {!! Form::open(array('url' => '')) !!}
        {!! Form::submit('Add to Cart', array(
          'class' => 'btn btn-default'
          )
          ) !!}
      {!! Form::close() !!}

        </div>
      </div>
      {{-- end create category  --}}

    </div>

    @endsection