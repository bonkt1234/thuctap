

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assetss/images/game.jpg') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Blog_game.com | Share game you know</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>

</style>
    <!-- Additional CSS Files -->
    @include('css')
    <link rel="stylesheet" href="{{ asset('assetss/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    @include('bar')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
           
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            
          </div>
        </div>
      </div>
    </div>
    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
          @if(isset($l))
            <h1>
            {{ $category->name }}
            </h1>
          @endif
            <div class="row">
            @if(isset($posts) && isset($posts))
            @foreach ($posts as $post)
              <div class="col-md-6">
                <div class="service-item">
                  <a href="{{ route('posts.show', $post->post_id) }}" class="services-item-image"><img src="{{ asset($post->image) }}" class="img-fluid" alt=""></a>
                  <div class="down-content">
                    <h4><a href="{{ route('posts.show', $post->post_id) }}">{{ $post->title }}</a></h4>
                    <p style="margin: 0;"> {{ $post->user->username }} &nbsp;&nbsp;|&nbsp;&nbsp; {{ $post->post_date }} &nbsp;&nbsp;|&nbsp;&nbsp; {{$post->post_id}}</p>
                  </div>
                </div>
              </div>
              @endforeach
              <div class="col-md-12">
                <ul class="pages">
                  <li>{{ $posts->links() }}</li>
                </ul>
            @else
                Giá trị không tồn tại.
            @endif
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-form">
              <div class="form-group">
                <h5>Blog Search</h5>
              </div>
              <form action="{{ route('posts.search') }}" method="GET">
              @csrf
              <div class="row">
                <div class="col-8">
                  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2" name="search" >
                </div>

                <div class="col-4">
                  <button class="filled-button" type="submit">Go</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".owl-banner").owlCarousel({
        items: 1,
        loop: true,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 5000 
      });
    });
  </script>
  </body>
</html>