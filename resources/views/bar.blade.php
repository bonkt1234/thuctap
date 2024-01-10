<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}"><h2>Blog <em>Game</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 
                @if(isset($user))
                @if($user->roles->contains('name', 'admin'))
                <li class="nav-item"><a class="nav-link" href="{{ route('admin') }}">admin</a></li>
                @endif
                @endif
                @if(isset($categories))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">thể loại</a>
                    
                    <div class="dropdown-menu">
                    
                    @foreach($categories as $category)
                      <a class="dropdown-item" href="{{ route('posts.category', $category->category_id) }}">{{ $category->name }}</a>
                    @endforeach
                    
                    </div>
                   
                </li>
                @endif
                <li class="nav-item"><a class="nav-link" href="{{ route('about_us') }}">About Us</a></li>
                <li class="nav-item">
                @auth
                <li class="nav-item">
                <p class="nav-link">Hello, {{ $user->username }}!</p>
                </li>
                <div class="user-area dropdown float-right">
                        <a href="#"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset($user->image)}}" alt="User Avatar">
                        </a>

                        <div  class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('posts.index') }}"><i class="fa fa- user" style="color: black;"></i>My Profile</a>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>
                    </div>
                
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Register</a>
                </li>
                @endauth
                </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>