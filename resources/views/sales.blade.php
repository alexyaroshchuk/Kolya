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
                    <li><a class="nav-link" href="{{route('showOrders')}}">Заказы</a></li>
                     @if($client)
                    <li><a class="nav-link" href="{{route('showProfile')}}">Профиль</a></li>
                    @endif
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
 <!-- Main jumbotron for a primary marketing message or call to action -->
   

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
       @foreach($sales as $sale)
      
     <div class="col-md-6">
          <h2>Продажа от {{ $sale->created_at }}</h2>
          <h4 align="center">   </h4>
         
          <hr>
        </div>
      
      @endforeach
       
      <div class="form">
			
				<form method="POST" action="{{route('storeSale')}}">
				  
				  <div class="col-md-12" align="center">
				  <button type="submit" class="btn btn-default">Добавить продажу</button>
				  
				   {{ csrf_field() }}
				    </div>
				    
				</form>
      
      </div>

 

<div class="col-md-12"


      <footer>
      <hr>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
       </div>
       </div>
    </div> <!-- /container -->
    
    </body>
</html>
