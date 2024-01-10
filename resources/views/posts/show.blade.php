<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('assetss/images/game.jpg') }}">

    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>PHPJabbers.com | Free Car Rental Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assetss/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assetss/css/owl.css') }}">
    @include('css')
    <style>
        /* Style cho nút cờ */
        .report-button {
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Style cho nút cờ khi có reports */
        .report-button.reported {
            background-color: #e74c3c;
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
<!-- Header -->
@include('../bar')
<!-- Page Content -->

<div class="page-heading about-heading header-text"
     style="background-image: url({{ asset($post->game->image) }});">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4><i class="fa fa-user"></i>{{ $post->user->username }} &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-calendar"></i> {{ $post->post_date }}
                        10:30 &nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-eye"></i> 114</h4>
                    <h2> {{ $post->title }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>{{ $post->title }}</h2>
                </div>
            </div>

            <div class="col-md-8">
            <p>
            <span style="font-weight: bold;">game:</span>
            {{ $post->game->title }}
            </p>
            <br>
            <p>
            <span style="font-weight: bold;">phát triển bởi:</span>
            {{ $post->game->developer}}
            </p>
            <br>
            <p>
            <span style="font-weight: bold;">ngày phát hành:</span>
            {{ $post->game->release_date}}
            </p>
            <br>
            
            </p>
            <span style="font-weight: bold;">nền tảng:</span>
            {{ $post->game->platform}}
            </p>

            <br>
            <p>
           <span style="font-weight: bold;" >link web download:</span>
           <a href="{{ url($post->game->link) }}" target="_blank">
            {{ $post->game->link}}
            </a>
            </p>

<br>

                <h5>Giới Thiệu</h5>

                <br>

                <p>{{ $post->content}}</p>
            </div>

            <div class="col-md-4">
                <div class="left-content">
                    <h4><img src="{{ asset($post->game->image) }}" class="img-fluid" alt=""></h4>

                    <br>

                    <p>{{ $post->game->description}}</p>
                </div>
            </div>
        </div>

        <br>

        <div>
            <img src="{{ asset($post->image) }}" class="img-fluid" alt="">
        </div>
    </div>
</div>

<div class="send-message">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                
                    <h2>Leave a Comment</h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-form">
                    @if(isset($user))
                    <form id="contact"  method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->user_id }}">
                                <input type="hidden" name="post_id" value="{{ $post->post_id }}">
                                    <textarea name="content" rows="6" class="form-control" id="message"
                                              placeholder="Write your comment..." required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="filled-button">Comment</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                    @endif
                    @forelse ($post->comments as $comment)
                        <div>
                            <p>{{ $comment->content }}</p>
                            <p>Posted by: {{ $comment->user->username }}</p>
                            <p>Commented on: {{ $comment->comment_date }}</p>
                        </div>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse
                </div>
            </div>

            <div class="col-md-4">
                <div class="left-content">
                <button onclick="toggleReports({{ $post->post_id }})"
                    class="report-button {{ $post->reports ? 'reported' : '' }}">
                    {{ $post->reports ? 'Unreport' : 'Report' }}
                </button>

                    <p>chia xẽ các thông tin game văn minh không toxic hay spam các nội dung độc hại nếu có vấn đề xin hãy liên hệ bằng đường link bên dươi hoặc báo cáo các vi phạm
                        <br>

                        <br>

                       vui lòng nhấn vào report 1 lần nếu muốn báo cáo</p>

                    <br>

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

@include('footer')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="contact-form">
                    <form action="#" id="contact">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input type="text" class="form-control" placeholder="Pick-up location"
                                           required="">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <input type="text" class="form-control" placeholder="Return location"
                                           required="">
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input type="text" class="form-control" placeholder="Pick-up date/time"
                                           required="">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <input type="text" class="form-control" placeholder="Return date/time"
                                           required="">
                                </fieldset>
                            </div>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter full name" required="">

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <input type="text" class="form-control" placeholder="Enter email address"
                                           required="">
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <input type="text" class="form-control" placeholder="Enter phone" required="">
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Book Now</button>
            </div>
        </div>
    </div>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    function toggleReports(postId) {
    axios.post(`/report/${postId}/toggle`)
        .then(response => {
            console.log(response.data.message);
            console.log('Reports:', response.data.reports);
            
        })
        .catch(error => {
            console.error('Error:', error.response.data.message);
        });
}
</script>
<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ asset('assetss/js/custom.js') }}"></script>
<script src="{{ asset('assetss/js/owl.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
