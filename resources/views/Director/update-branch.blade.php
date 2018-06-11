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
			
				<form method="POST" action="{{route('storeUpdateBranch')}}">
				  <div class="form-group">
				    <label for="title">Город</label>
				    <input type="text" class="form-control" id="title" name="city" value={{$branch->city}}>
				  </div>
				  <div class="form-group">
				    <label for="alias">Улица</label>
				    <input type="text" class="form-control" id="alias" name="streat" value={{$branch->streat}}>
				  </div>
				  <div class="form-group">
				    <label for="alias">Дом №</label>
				    <input type="text" class="form-control" id="alias" name="housenumber" value={{$branch->housenumber}}>
				  </div>
				    <div class="form-group">
				    <label for="alias">Активно:</label>
				    <input type="checkbox" id="alias" name="active">
				  </div>
				  
				   </div>
				   <div class="form-group">
				    <input type="hidden" class="form-control" id="alias" name="id"  value= {{$branch->id}}>
				  </div>
				  
				  <button type="submit" class="btn btn-default">Обновить</button>
				  
				   {{ csrf_field() }}
				    
				</form>
			
	          
		       
	        </div>
     
				
    
			
	  
	       
	     <hr>    
	    
	    
 
 

      <footer>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->

@endsection