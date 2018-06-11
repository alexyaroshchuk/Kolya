@extends('Director.layouts.site')

@section('content')

    <hr>
     @if(count($errors) > 0)
    
    <div class="alert alert-danger">
     <ul>
     	@foreach($errors->all() as $error)
     	   <li>{{ $error }}</li>
     	@endforeach
     </ul>
     
    </div>
    @endif
    
    @if (session('message'))
    <div class="alert alert-success">
    	{{ session('message') }}	
    </div>
    @endif
    
    <div class="container">
      <!-- Example row of columns -->
  <div class="row">

			<div class="form">
			
				<form method="POST" action="{{route('storeBranch')}}">
				  <div class="form-group">
				    <label for="title">Город</label>
				    <input type="text" class="form-control" id="title" name="city" placeholder="Введите название города">
				  </div>
				  <div class="form-group">
				    <label for="alias">Улица</label>
				    <input type="text" class="form-control" id="alias" name="streat" placeholder="Введите название улицы">
				  </div>
				   <div class="form-group">
				    <label for="alias">Дом №</label>
				    <input type="text" class="form-control" id="alias" name="housenumber" placeholder="Введите название улицы">
				  </div>
				
				 
				  
				  <button type="submit" class="btn btn-default">Добавить</button>
				  
				   {{ csrf_field() }}
				    
				</form>
			
	          
		       
	        </div>
      </div>
				
    
			
	  
	       
	     <hr>    
	    
	    
 
 

      <footer>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->

@endsection