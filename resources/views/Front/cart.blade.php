@extends('Layouts.frontend')

@section('content')
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

    {{-- show products --}}
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Product Title</th>
          <th>Price</th>
          <th>Discount</th>
          <th>Quantity</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach (Cart::content() as $cart)
          <tr class="">
            <td>
              {!! $cart->name !!}
            </td>
            <td>
              {!! $cart->price !!}
            </td>
            <td>
              @if ($cart->options->has('discount') && $cart->options->discount!= 1 )
                {!! $cart->options->discount !!}
              @else
                No Discount
              @endif
            </td>
            <td>
              {!! $cart->qty !!}
            </td>
            <td>
              delete
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection