

@extends('Layouts.frontend')

@section('content')

<div class="container">
  <h3>Products List</h3>

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
        <p class="text-center">
          @if($item->discount == 1)
            No Discount
          @else
            On Sale
          @endif
          </p>
        <p class="text-center">{!! $availabilities[$item->availability] !!}</p>

        <div class="form-inline">
          <div class="form-group">
            {{-- goto product detail page --}}
            {!! Form::open(array('url' => 'product\product', 'method' => 'get')) !!}
            {!! Form::hidden('id', $item->id) !!}
            {!! Form::submit('Buy', array(
              'class' => 'btn btn-primary'
              )
              ) !!}
              {!! Form::close() !!}
            </div>

            <div class="form-group pull-right">
              {{-- fix: add to cart --}}
              {!! Form::open(array('url' => '')) !!}
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