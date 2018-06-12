<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-telegram" aria-hidden="true"></i> Tech Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/services')}}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/contact')}}">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            @if(Session::get('uid'))
              <li class="nav-item"><a class="nav-link"  href="{{url('userlogout')}}">Logout</a></li>
              <li class="nav-item"><a class="nav-link" href="javascript:void(0)">{{Session::get('username')}}</a></li>
            @else
            <li class="nav-item"><a class="nav-link"  href="{{url('login-user')}}">Login</a></li>
            <li class="nav-item"><a href="{{url('create-account')}}" class="nav-link">Register</a></li>
            @endif
          </ul>
        </div>
      </div>
    </nav>