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

    {{-- create category  --}}
    <div>
      <h3>Create New Category</h3>
      {!! Form::open(array('url' => 'admin/product/category/create', 'class' => 'form-inline')) !!}
        <div class="form-group">
          {!! Form::Label('name', 'Category name', array('sr-only')) !!}
          {!! Form::text('name', Input::old('name'), array('placeholder' => 'Input new category name', 'class' => 'form-control')) !!}
          {!! Form::submit('Create Category', array('class' => 'btn btn-default', 'name' => 'createCategory')) !!}
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
                {!! Form::open(array('url' => 'admin/product/category/update', 'class'=>'form-inline')) !!}
                  {!! Form::hidden('id', $category->id) !!}
                  {!! Form::text('name', $category->name, array('class' => 'form-control')) !!}
                  {!! Form::submit('update', array('class' => 'btn btn-success')) !!}
                {!! Form::close() !!}
              </td>
              <td>
                {!! Form::open(array('url' => 'admin/product/category/destroy', 'class'=>'form-inline')) !!}
                  {!! Form::hidden('id', $category->id) !!}
                  {!! Form::submit('delete', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{-- end show category --}}
  </div>

@endsection