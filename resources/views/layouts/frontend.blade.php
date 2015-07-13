<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iStore</title>
  {!! HTML::style('assets/stylesheets/style.css') !!}
</head>
<body ng-app="iStoreFront" ng-cloak>
  
  
  {{-- header --}}
  @include('Layouts.frontPartials.header')
  {{-- end header --}}

  {{-- content --}}
  @yield('content')
  {{-- end content --}}

  {{-- footer --}}
  @include('Layouts.frontPartials.footer')
  {{-- end footer --}}


  {!! HTML::script('assets/javascripts/frontend.js') !!}
</body>
</html>