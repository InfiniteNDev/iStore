

@extends('Layouts.frontend')

@section('content')

<div class="container">
  <h3>Products List</h3>

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

  {{-- show products --}}
@foreach(array_chunk($products->getCollection()->all(), 3) as $row)
  <div class="row ">
    @foreach ($row as $item)
      <div class="col-sm-12 col-md-4 col-lg-4">
        <div class="front-products-item">
          <div class="text-center">
            {!! HTML::image(str_replace('public/', '', $item->image), $item->title, array('class' => 'img-rounded', 'height' => '200')) !!}
          </div>

          <h4 class="text-center">{!! $item->title !!}</h4>
          <p class="text-center">{!! $item->price !!}</p>
          <p class="text-center">Discount: {!! App\Libs\Discount::displayWithNum($item->discount) !!}</p>
          <p class="text-center">{!! App\Libs\Availability::display($item->availability) !!}</p>

          <div class="form-inline">
            <div class="form-group">
              {{-- goto product detail page --}}
              {!! Form::open(array('url' => 'product/product', 'method' => 'get')) !!}
              {!! Form::hidden('id', $item->id) !!}
              {!! Form::submit('Details', array(
                'class' => 'btn btn-primary'
                )
                ) !!}
                {!! Form::close() !!}
            </div>

            <div class="form-group pull-right">
              {{-- add to cart --}}
              {!! Form::open(array('url' => 'cart/add')) !!}
              {!! Form::hidden('id', $item->id) !!}
              {!! Form::submit('Add to Cart', array(
                'class' => 'btn btn-default'
                )
                ) !!}
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endforeach

      {{-- pagination --}}
      {!! $products->appends(Request::except('page'))->render() !!}
      {{-- end pagination --}}

    </div>
    {{-- end show products --}}
  </div>

  @endsection