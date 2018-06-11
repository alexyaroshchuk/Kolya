 @extends('layouts.site')
 
 @section('content')
 
 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      
       <h1 align="center"> </h1>

        <p>{{ $message }}</p>
       
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
    
      
       <div class="col-md-6">
          <h3 align="center">Имя:</h3>
          <h3 align="center">Фамилия:</h3>
          <h3 align="center">Телефон:</h3>
          <h3 align="center">Город:</h3>
          <h3 align="center">Улица:</h3>
          <h3 align="center">Номер Дома:</h3>
         
        </div>
      
      <div class="col-md-6">
          <h3 align="center">{{ $client->firstname }}</h3>
          <h3 align="center">{{ $client->lastname }}</h3>
          <h3 align="center">{{ $client->phonenumber }}</h3>
          <h3 align="center">{{ $client->city }}</h3>
          <h3 align="center">{{ $client->streat }}</h3>
          <h3 align="center">{{ $client->housenumber }}</h3>
         
        </div>
        
         <div class="col-md-12" align="center">
         
        <p><a class="btn btn-default" href="{{ route('updataProfile', ['id'=>$client->id]) }}" role="button">Обновить информацию &raquo;</a></p>
         
        </div>
      
     
      
      </div>

      <hr>

      <footer>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->
    
    @endsection