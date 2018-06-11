 @extends('layouts.site')
 
 @section('content')
 
 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      
       <h1> {{ $header }}</h1>

        <p>{{ $message }}</p>
      
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
       @foreach($orders as $order)
      
     <div class="col-md-6">
          <h2>Заказ от {{ $order->created_at }}</h2>
          <h4 align="center">   </h4>
           <p><a class="btn btn-default" href="{{ route('orderDetalsShow', ['id'=>$order->id]) }}" role="button">Подробнее &raquo;</a></p>
           <p><a class="btn btn-default" href="{{ route('addOrderDetals', ['id'=>$order->id]) }}" role="button">Добавить товар &raquo;</a></p>
          <hr>
        </div>
      
      @endforeach
       
      <div class="form">
			
				<form method="POST" action="{{route('storeOrder')}}">
				  
				  <div class="col-md-12" align="center">
				  <button type="submit" class="btn btn-default">Добавить заказ</button>
				  
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
    
    @endsection