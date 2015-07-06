@extends('Layouts.backend')

@section('content')

  <div class="container">
    <h3>Product Category</h3>

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

    {{-- message --}}
    @if (Session::has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p>{{ Session::get('message') }}</p>
        </ul>
      </div>
    @endif
    {{-- end message --}}

    {{-- create category  --}}
    <div>
      <h3>Create New Category</h3>
      {!! Form::open(array('url' => 'admin/product/category/create', 'class' => 'form-inline')) !!}
        <div class="form-group">
          {!! Form::Label('name', 'Category name', array('sr-only')) !!}
          {!! Form::text('name', Input::old('name'), array('placeholder' => 'Input new category name', 'class' => 'form-control')) !!}
          {!! Form::submit('Create Category', array('class' => 'btn btn-primary', 'name' => 'createCategory')) !!}
        </div>
      {!! Form::close() !!}
    </div>
    {{-- end create category  --}}

    <hr/>

    {{-- show category --}}
    <div>
      <h3>Category List</h3>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Category Id</th>
            <th>Category Name</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)
            <tr class="">
              <td>
                {!! $category->id !!}
              </td>
              <td>
                {!! Form::open(
                  array(
                    'url'   => 'admin/product/category/update',
                    'class' =>'form-inline')) 
                !!}
                  {!! Form::hidden('id', $category->id) !!}
                  {!! Form::text('name', $category->name, array('class' => 'form-control')) !!}
                  {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
                {!! Form::close() !!}
              </td>
              <td>
                  {!! Form::button(
                    'Delete', 
                    array(
                      'class' => 'btn btn-danger',
                      'data-toggle' => 'modal',
                      'data-target' => '#confirm-delete',
                      'type'  => 'button'
                    )
                  ) !!}
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
                'url'   => 'admin/product/category/destroy',
                'class' =>'form-inline')) 
            !!}
              {!! Form::hidden('id', $category->id) !!}
              {!! Form::button('Close', array('class' => 'btn btn-default',
              'data-dismiss' => 'modal',
              'type' => 'button')) !!}
              {!! Form::submit('Delete', 
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
      {!! $categories->render() !!}
      {{-- end pagination --}}

    </div>
    {{-- end show category --}}
  </div>

@endsection