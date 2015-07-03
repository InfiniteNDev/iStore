<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iStore</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/style.css') }}">
</head>
<body>
  
  
  {{-- header --}}
  @include('Layouts.frontPartials.header')
  {{-- end header --}}

  {{-- content --}}
  @yield('content')
  {{-- end content --}}

  {{-- footer --}}
  @include('Layouts.frontPartials.footer')
  {{-- end footer --}}


  <script type="text/javascript" src="{{ asset('assets/javascripts/frontend.js') }}"></script>
</body>
</html>