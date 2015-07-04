<div class="container">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        {!! HTML::image('assets/images/carousel-1.jpg', 'carousel') !!}
        <div class="carousel-caption">
          carousel-1
        </div>
      </div>
      <div class="item">
        {!! HTML::image('assets/images/carousel-2.jpg', 'carousel') !!}
        <div class="carousel-caption">
          carousel-2
        </div>
      </div>
      <div class="item">
        {!! HTML::image('assets/images/carousel-3.jpg', 'carousel') !!}
        <div class="carousel-caption">
          carousel-3
        </div>
      </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>