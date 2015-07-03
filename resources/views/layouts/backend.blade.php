<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iStore</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/stylesheets/style.css') }}">
</head>
<body>
  
  
  {{-- header --}}
  @include('Layouts.backPartials.header')
  {{-- end header --}}

  {{-- content --}}
  @yield('content')
  {{-- end content --}}

  {{-- footer --}}
  @include('Layouts.backPartials.footer')
  {{-- end footer --}}


  <script type="text/javascript" src="{{ asset('assets/javascripts/backend.js') }}"></script>
</body>
</html>