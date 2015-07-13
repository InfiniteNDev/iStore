@extends('Layouts.frontend')

@section('content')
  <div ng:controller="cartController">
    {{-- {!! dd(Cart::content()); !!} --}}
    <div class="container">
      {{-- message --}}
      @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p>{{ Session::get('message') }}</p>
          </ul>
        </div>
      @endif
      {{-- end message --}}

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

      {{-- show cart items --}}
      <table class="table table-striped cart-container">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr ng:repeat="item in cart.items">
            <td>
              <a ng:model="item.name" href="product/product?id=@{{item.id}}">
                <img src="@{{item.options.product.image.replace('public/', '')}}" height=50>
                @{{ item.name }}
              </a>
            </td>
            <td>
              <p ng:model="item.price">@{{ item.price }}</p>
            </td>
            <td>
              @{{ (item.options.discount>=0 && item.options.discount<1) ? item.options.discount : "No Discount" }}
            </td>
            <td>
              <input type="number" ng:model="item.qty" ng-change="update(item)" class="form-control" required min="1" max="@{{ item.options.product.stock }}">
            </td>
            <td>
              {!! Form::open(['method' => 'POST', 'url' => 'cart/remove', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('rowId', "@{{ item.rowid }}") !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        </tbody>
      </table>
      {{-- end show cart items --}}
    </div>

    {{-- show info: total price... --}}
    <div class="cart-info">
      <div class="container">
        {!! Form::open(['method' => 'POST', '' => '', 'class' => 'form-horizontal']) !!}
        
            Total Price: @{{ total() | currency }}
        
            <div class="btn-group pull-right">
                {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                {!! Form::submit("Buy", ['class' => 'btn btn-success']) !!}
            </div>
        
        {!! Form::close() !!}
      </div>
    </div>
    {{-- end show info: total price... --}}
  </div>

@endsection