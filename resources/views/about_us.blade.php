<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assetss/images/game.jpg') }}">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Blog Game | Nơi Chia sẻ Game</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assetss/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @include('css')
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
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/downloa.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Về Chúng Tôi</h4>
              <h2>Chào mừng bạn đến với Blog Game - Nơi Đam Mê Game Thắp Lên Niềm Vui!</h2>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Về Chúng Tôi</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="{{ asset('assets/images/download.jpg') }}" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Về Chúng Tôi.</h4>
              <p>Chúng tôi là một đội ngũ đam mê game, chúng tôi tin rằng game không chỉ là một trò chơi, mà còn là một trải nghiệm, một cộng đồng và một nguồn cảm hứng. Tại [Tên Trang Blog], chúng tôi dành nhiều thời gian để chia sẻ niềm đam mê này với cộng đồng game rộng lớn.</p>
              <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Nội Dung của Chúng Tôi.</h2>
            </div>

            <h5>Nội Dung của Chúng Tôi.</h5>

            <p>Sứ mệnh của chúng tôi là tạo ra một không gian trực tuyến nơi mọi người có thể kết nối, chia sẻ ý kiến, và tìm hiểu về thế giới đa dạng và phong phú của game. Chúng tôi tin rằng mỗi tựa game đều mang đến một câu chuyện và trải nghiệm độc đáo, và chúng tôi muốn giúp bạn khám phá những điều đó.</p>

            <p>Tại Bog_Game, chúng tôi cung cấp nhiều loại nội dung khác nhau về game, từ đánh giá game, hướng dẫn chơi, tin tức ngành công nghiệp đến bài viết về văn hóa game và cộng đồng. Chúng tôi luôn cố gắng đảm bảo rằng mỗi bài viết của chúng tôi không chỉ là thông tin mà còn là nguồn động viên và sự kích thích cho độc giả.</p>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
