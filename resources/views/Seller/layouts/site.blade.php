
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Jumbotron Template for Bootstrap</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jumbotron.css') }}" rel="stylesheet">
<!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
     <script src="{{ asset('js/app.js') }}" defer></script>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">Project name</a>
        </div>
        <ul id="navbar" class="menu">
                    <li><a class="nav-link" href="{{route('showSales')}}">Продажи</a></li>
                    
                    <li><a class="nav-link" href="https://laravel-news.com">News</a></li>
                    <li><a class="nav-link" href="https://forge.laravel.com">Forge</a></li>
                    <li></li>
                        @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ ('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
            
      

       
        </ul><!--/.navbar-collapse -->
      </div>
    </nav>

  @yield('content')

  </body>
</html>

