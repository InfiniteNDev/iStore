<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>iStore - BackEnd</title>
  {!! HTML::style('assets/stylesheets/style.css') !!}
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

  {!! HTML::script('assets/javascripts/backend.js') !!}

  @yield('script')
</body>
</html>