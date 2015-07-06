@extends('Layouts.backend')

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
    <div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Stock</th>
            <th>Availability</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
            <tr class="">
              <td>
                {!! $product->id !!}
              </td>
              <td>
                {!! $product->title !!}
              </td>
              <td>
                {!! $categories[$product->category_id] !!}
              </td>
              <td>
                {!! $product->price !!}
              </td>
              <td>
                {!! App\Libs\Discount::displayWithNum($product->discount) !!}
              </td>
              <td>
                {!! $product->stock !!}
              </td>
              <td>
                {!! Form::open(
                  array(
                  'url'   => 'admin/product/toggleAvailability',
                  'class' => 'form-inline'
                  )
                ) !!}
                  {!! Form::hidden('id', $product->id) !!}
                  {!! Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), $product->availability, array('class' => 'form-control')) !!}
                  {!! Form::submit(
                    'Update',
                    array(
                      'class' => 'btn btn-primary'
                    )
                  ) !!}
                {!! Form::close() !!}
              </td>
              <td>
                {!! Form::open(
                  array(
                  'method' => 'get',
                  'url'    => 'admin/product/edit',
                  'class'  =>'form-inline'
                  )
                ) !!}
                  {!! Form::hidden('id', $product->id) !!}
                  {!! Form::submit(
                    'Edit',
                    array(
                      'class' => 'btn btn-success'
                    )
                  ) !!}
                {!! Form::close() !!}
              </td>
              <td>
                {!! Form::open(
                  array(
                  'url'   => 'admin/product/destroy',
                  'class' =>'form-inline'
                  )
                ) !!}
                  {!! Form::hidden('id', $product->id) !!}
                  {!! Form::submit(
                    'Delete',
                    array(
                      'class' => 'btn btn-danger'
                    )
                  ) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{-- pagination --}}
      {!! $products->appends(Request::except('page'))->render() !!}
      {{-- end pagination --}}

    </div>
    {{-- end show products --}}
  </div>

@endsection