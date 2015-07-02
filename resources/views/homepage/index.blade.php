@extends('layouts.single')

@section('content')
  {{-- carousel --}}
  @include('homepage.partials.carousel')
  {{-- end carousel --}}

  {{-- about --}}
  @include('homepage.partials.about')
  {{-- end about --}}

  {{-- products --}}
  @include('homepage.partials.products')
  {{-- end products --}}

  {{-- articles --}}
  @include('homepage.partials.articles')
  {{-- end articles --}}

  {{-- feedback --}}
  @include('homepage.partials.feedback')
  {{-- end feedback --}}

  {{-- contact --}}
  @include('homepage.partials.contact')
  {{-- end contact --}}

@endsection