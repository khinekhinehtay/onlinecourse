@section('header')
    <nav class="navbar navbar-expand-lg navbar-info bg-info">
    <a class="navbar-brand" id= "navbar-logo" >{{ Html::image('images/logo.png', 'LOGO', array('class'=> 'logo')) }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if (Auth::check() && Auth::user()->role()->first()->name = "Author")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Notifications</a>
                    </li>
                @endif

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                </li>
                @endguest

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Courses</a>
                </li>
                
                @if (Auth::check() && Auth::user()->role()->first()->name == "Admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">Tutors</a>
                    </li>
                @endif
                @if (Auth::check() && Auth::user()->role()->first()->name == "Admin")
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">Students</a>
                </li>
                @endif

            </ul>
          
            <ul class="navbar-nav ml-auto">
               
                
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('register') }}">Register</a>
                    </li>
                @else
                @if (Auth::check() && Auth::user()->role()->first()->name == "Student")
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('course.index') }}">My Courses</a>
                </li>
                @endif
                @if (Auth::check())
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.account', [Auth::id()]) }}">Account</a>
                    </li>
                    
                @endif

                    <li class="nav-item">
                        <div id="logoutbutton">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logoutform').submit();">
                                    Logout
                                </a>
                        </div>
                                <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                    </li>
                @endguest
                
            </ul>
        </div>
    </nav>