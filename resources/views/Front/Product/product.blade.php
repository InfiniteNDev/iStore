@extends('Layouts.frontend')

@section('content')

<div class="container">
  <h3>Product: {!! $product->title !!}</h3>

  <hr/>
  
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
      {!! HTML::image(str_replace('public/', '', $product->image), $product->title, array('class' => 'img-rounded', 'height' => '200')) !!}
    </div>
    
    {{-- product info  --}}
    <div class="col-sm-12 col-md-8 col-lg-8">
      <p>
        <strong>Product title: </strong>
        {!! $product->title !!}
      </p>

      <p>
        <strong>Product Price: </strong>
        {!! $product->price !!}
      </p>

      <p>
        <strong>Product Discount: </strong>
        {!! App\Libs\Discount::displayWithNum($product->discount) !!}
      </p>

      <p>
        <strong>Product Stock: </strong>
        {!! $product->stock !!}
      </p>

      <p>
        <strong>Availability: </strong>
        {!! App\Libs\Availability::display($product->availability) !!}
      </p>

      {{-- goto checkout --}}
      {!! Form::open(array('url' => '', 'method' => 'get')) !!}
        {!! Form::hidden('id', $product->id) !!}
        {!! Form::submit('Buy', array(
          'class' => 'btn btn-primary')
        ) !!}
      {!! Form::close() !!}
      <br/>

      {{-- add to cart --}}
      {!! Form::open(array('url' => '')) !!}
        {!! Form::submit('Add to Cart', array(
          'class' => 'btn btn-default')
        ) !!}
      {!! Form::close() !!}

    </div>
    {{-- end product info  --}}

  </div>

  <hr/>
  
  <div class="form-group">
    <h3>Product Category</h3>
    <p>
      {!! $categories[$product->category_id] !!}
    </p>

    <h3>Product Description</h3>
    <p>
    {!! $product->description !!}
    </p>
  </div>

</div>

@endsection