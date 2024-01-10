

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

    <!-- Additional CSS Files -->
    @include('css')
    <link rel="stylesheet" href="{{ asset('assetss/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  </head>

 

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
<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <!-- Add your CSS styles or include a stylesheet here if needed -->
    
    <style>

h1 {
    text-align: center;
    color: #333;
}

form {
    max-width: 600px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 8px;
}

input,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="file"] {
    margin-top: 4px; /* Adjust spacing for file input */
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}

#category-container {
    margin-top: 16px;
}

#category-container h3 {
    margin-bottom: 8px;
    color: #333;
}

#category-container label {
    display: block;
    margin-bottom: 8px;
}
#back-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
        }

        #back-btn a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        #back-btn a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
@include('../bar')
    <h1>tạo bài đăng</h1>

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="game_title">Tên Game:</label>
        <input type="text" name="game_title" required>
        <br>

        <label for="game_description">Cốt Truyện:</label>
        <textarea name="game_description" required></textarea>
        <br>

        <label for="release_date">Ngày Phát Hành:</label>
        <input type="date" name="release_date" required>
        <br>

        <label for="developer">Nhà phát triển:</label>
        <input type="text" name="developer" required>
        <br>

        <label for="platform">Nền Tảng:</label>
        <input type="text" name="platform" required>
        <br>

        <label for="game_image">ảnh game:</label>
        <input type="file" name="game_image">
        <br>

        <label for="game_link">Link web game:</label>
        <input type="text" name="game_link" required>
        <br>
        <div id="category-container">
            <h3>Thể Loại</h3>
            @foreach($categories as $category)
                <label>
                    <input type="checkbox" name="category_ids[]" value="{{ $category->category_id }}">
                    {{ $category->name }}
                </label>
            @endforeach
        </div>
        <br>
        <label for="post_title">Tiêu đề:</label>
        <input type="text" name="post_title" required>
        <br>

        <label for="post_content">Mô tả game:</label>
        <textarea name="post_content" required></textarea>
        <br>

        <label for="post_image">ảnh:</label>
        <input type="file" name="post_image">
        <br>

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <button type="submit">Tạo Bài</button>
    </form>
    @if (count($errors) > 0)
        <div role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div id="back-btn">
        <a href="{{ route('posts.index') }}">trở lại trang cá nhân</a>
    </div>
    </body>
</html>
