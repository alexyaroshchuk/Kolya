 @extends('Seller.layouts.site')
 
 @section('content')
 <!-- Main jumbotron for a primary marketing message or call to action -->
   

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
       @foreach($sales as $sale)
      
     <div class="col-md-6">
          <h2>Продажа от {{ $sale->created_at }}</h2>
          <h4 align="center">   </h4>
          
          <p><a class="btn btn-default" href="{{ route('saleDetalsShow', ['id'=>$sale->id]) }}" role="button">Подробнее &raquo;</a></p>
          <p><a class="btn btn-default" href="{{ route('addSaleDetals', ['id'=>$sale->id]) }}" role="button">Добавить товар &raquo;</a></p>
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
    
     @endsection
