 @extends('Seller.layouts.site')
 
 @section('content')
 
 <!-- Main jumbotron for a primary marketing message or call to action -->
 
    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
       @foreach($sale_detals as $detals)
      
     <div class="col-md-12">
          <h4>Код товара: {{ $detals->model_id }}  Количество: {{ $detals->quantity }}  </h4>
         
          <hr>
        </div>
      
      @endforeach
       
     
			
				    
				
      
      </div>

 

<div class="col-md-12"


      <footer>
      <hr>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
       </div>
    </div> <!-- /container -->
    
    @endsection