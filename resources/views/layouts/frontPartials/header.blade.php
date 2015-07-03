<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ URL::to('/') }}">iStore</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class='{{ Request::is('/') ? 'active' : '' }}'>
            <a href="/">Home</a>
          </li>
          <li class='{{ Request::is('products') ? 'active' : '' }}'>
            <a href="{{ URL::to('products') }}">Shop</a>
          </li>
          <li class='{{ Request::is('articles') ? 'active' : '' }}'>
            <a href="{{ URL::to('articles') }}">Blog</a>
          </li>
          <li class='{{ Request::is('about') ? 'active' : '' }}'>
            <a href="{{ URL::to('about') }}">About</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class='{{ Request::is('cart') ? 'active' : '' }}'>
            <a href="{{ URL::to('cart') }}">Cart</a>
          </li>
          @if (Auth::check())
            <li class='dropdown {{ Request::is('account')|Request::is('logout') ? 'active' : '' }}'>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class='{{ Request::is('account') ? 'active' : '' }}'>
                  <a href="{{ URL::to('account') }}">My Account</a>
                </li>
                <li class='{{ Request::is('logout') ? 'active' : '' }}'>
                  <a href="{{ URL::to('logout') }}">Log out</a>
                </li>
              </ul>
            </li>
          @else
          <li class='{{ Request::is('login') ? 'active' : '' }}'>
              <a href="{{ URL::to('login') }}">Login</a>
            </li>    
          @endif
        </ul>

        <form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>