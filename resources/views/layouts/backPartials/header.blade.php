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
        <a class="navbar-brand" href="{{ URL::to('admin') }}">BackEnd</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class='{{ Request::is( 'admin') ? 'active' : '' }}'>
            <a href="{{ URL::to('admin') }}">Home</a>
          </li>
          <li class='dropdown {{ Request::is( 'admin/product*') ? 'active' : '' }}'>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Products
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li class='{{ Request::is('admin/product/products') ? 'active' : '' }}'>
                <a href="{{ URL::to('admin/product/products') }}">Products</a>
              </li>
              <li class='{{ Request::is('admin/product/category') ? 'active' : '' }}'>
                <a href="{{ URL::to('admin/product/category') }}">Category</a>
              </li>
            </ul>
          </li>
          <li class='{{ Request::is( 'admin/orders') ? 'active' : '' }}'>
            <a href="{{ URL::to('admin/orders') }}">Orders</a>
          </li>
          <li class='{{ Request::is( 'admin/articles') ? 'active' : '' }}'>
            <a href="{{ URL::to('admin/articles') }}">Articles</a>
          </li>
          <li class='{{ Request::is( 'admin/users') ? 'active' : '' }}'>
            <a href="{{ URL::to('admin/users') }}">Users</a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="{{ URL::to('/') }}">Back to FrontEnd</a></li>
          @if (Auth::check() && Auth::user()->type=='admin')
          <li><a href="{{ URL::to('admin/logout') }}">{{ Auth::user()->username }}, Logout</a></li>
          @endif
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>