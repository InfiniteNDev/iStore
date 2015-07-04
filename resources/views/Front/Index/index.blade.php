@extends('Layouts.frontend')

@section('content')
  {{-- carousel --}}
  @include('Front.Index.Partials.carousel')
  {{-- end carousel --}}
  
  <div class="container">
    {{-- about --}}
    @include('Front.Index.Partials.about')
    {{-- end about --}}

    {{-- products --}}
    @include('Front.Index.Partials.products')
    {{-- end products --}}

    {{-- articles --}}
    @include('Front.Index.Partials.articles')
    {{-- end articles --}}

    {{-- feedback --}}
    @include('Front.Index.Partials.feedback')
    {{-- end feedback --}}

    {{-- contact --}}
    @include('Front.Index.Partials.contact')
    {{-- end contact --}}
  </div>

@endsection