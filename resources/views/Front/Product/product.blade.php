@extends('Layouts.frontend')

@section('content')

<div class="container">
  {{-- error --}}
  @if ($errors->has())
    <div class="alert alert-danger alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <ul class="">
        @foreach ($errors->all() as $error)
        <li class="">{!! $error !!}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {{-- end error --}}

  <h3>Product: {!! $product->title !!}</h3>

  <hr/>
  
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
      {!! HTML::image(str_replace('public/', '', $product->image), $product->title, array('class' => 'img-rounded', 'height' => '200')) !!}
    </div>
    
    {{-- product info  --}}
    <div class="col-sm-12 col-md-4 col-lg-4">
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
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4">
      {!! Form::open(
        array('url' => 'product/buyorcart')
      ) !!}
        {!! Form::hidden('id', $product->id) !!}
        {{-- quantity --}}
        <div class="form-group form-inline">
          {!! Form::Label('quantity', 'Quantity', array('sr-only')) !!}
          {!! Form::text('quantity', '1' ,array(
            'class' => 'form-control'
            )) !!}
        </div>

        {{-- goto checkout --}}
        <div class="form-group">
            {!! Form::submit('Buy', array(
              'class'  => 'btn btn-primary',
              'name'   => 'buy')
              ) !!}
        </div>

        {{-- add to cart --}}
        <div class="form-group">
            {!! Form::submit('Add to Cart', array(
              'class'  => 'btn btn-default',
              'name'   => 'cart')
              ) !!}
        </div>
      {!! Form::close() !!}

    </div>
    {{-- end product info  --}}

  </div>

  <hr/>

  <div class="">
    <h3>Product Title</h3>
    <p>
      {!! $product->title !!}
    </p>

    <h3>Product Category</h3>
    <p>
      {!! App\Models\Category::find($product->category_id)->name !!}
    </p>

    <h3>Product Description</h3>
    <p>
      {!! $product->description !!}
    </p>
  </div>

</div>

@endsection