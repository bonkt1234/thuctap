

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assetss/images/game.jpg') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Blog_game.com | Share game you know</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    @include('css')
    <link rel="stylesheet" href="{{ asset('assetss/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        .rounded-image {
  border-radius: 50%; /* Đặt giá trị là 50% để bo tròn hình ảnh */
  width: 200px; /* Chỉnh kích thước chiều rộng của hình ảnh */
  height: 200px; /* Chỉnh kích thước chiều cao của hình ảnh */
  object-fit: cover; /* Để đảm bảo hình ảnh không bị méo khi bo tròn */
}
    </style>
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
    @include('../bar')
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
          <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tạo Bài</a>
            <div class="row">
            @if(isset($posts) )
            @foreach ($posts as $post)
            @php
                $i = isset($i) ? $i + 1 : 1;
            @endphp
              <div class="col-md-6">
                <div class="service-item">
                  <a href="{{ route('posts.show', $post->post_id) }}" class="services-item-image"><img src="{{ asset($post->image) }}" class="img-fluid" alt=""></a>
                  <div class="down-content">
                    <h4><a href="{{ route('posts.show', $post->post_id) }}">{{ $post->title }}</a></h4>
                    <p style="margin: 0;"> {{ $post->user->username }} &nbsp;&nbsp;|&nbsp;&nbsp; {{ $post->post_date }} &nbsp;&nbsp;|&nbsp;&nbsp; {{$post->post_id}} &nbsp;&nbsp;|&nbsp;&nbsp;   
                    <form action="{{ route('posts.destroy', $post->post_id,$post->game->game_id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
                    </form></p>
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
               
            </div>
            <img src="{{ $user->image }}" alt="User Image" class="rounded-image">
            <h1>User Profile</h1>
            <p>Tên Người dùng: {{ $user->username }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>ngày đăng ký: {{ $user->registration_date }}</p>
            <p>Số lượng bài viết đã đăng: {{ $i }}</p>
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
  </body>
</html>
