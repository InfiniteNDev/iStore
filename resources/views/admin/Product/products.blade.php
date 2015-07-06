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
                {!! App\Models\Category::find($product->category_id)->name !!}
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
                {!! Form::button(
                  'Delete',
                  array(
                    'class' => 'btn btn-danger',
                    'type'  => 'button',
                    'data-toggle' => 'modal',
                    'data-target'  => '#confirm-delete',
                    'data-id' => $product->id
                )) !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      {{-- delete confirm dialog --}}
      <!-- Modal -->
      <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="confirm">Confirm</h4>
            </div>
            <div class="modal-body">
              Are you sure?
            </div>
            <div class="modal-footer">
            {!! Form::open(
              array(
                'url'   => 'admin/product/destroy',
                'class' =>'form-inline')) 
            !!}
              <div class="product-id"></div>
              {!! Form::button('Close', array('class' => 'btn btn-default',
              'data-dismiss' => 'modal',
              'type' => 'button')) !!}
              {!! Form::submit(
                'Delete', 
                array(
                  'class' => 'btn btn-danger'
                )
              ) !!}
            {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>

      
      {{-- end delete confirm dialog --}}

      {{-- pagination --}}
      {!! $products->appends(Request::except('page'))->render() !!}
      {{-- end pagination --}}

    </div>
    {{-- end show products --}}
  </div>

@endsection

@section('script')
<script type="text/javascript">
  $('#confirm-delete').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var id = button.data('id'); // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.product-id').html('<input name="id" type="hidden" value="' + id + '">');
  })
</script>
@endsection