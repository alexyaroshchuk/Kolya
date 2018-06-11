@extends('Picker.layouts.site')

@section('content')

    
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
    <div class="alert alert-danger">
    	{{ session('message') }}	
    </div>
    @endif
    
    <div class="container">
      <!-- Example row of columns -->
  <div class="row">

			<div class="form">
			
				<form method="POST" action="{{route('storeWaybillDetals', ['id'=>$waybill_id])}}">
				  <div class="form-group">
				    <label for="title">Код</label>
				    <input type="text" class="form-control" id="title" name="id" placeholder="Введите код товара">
				  </div>
				  <div class="form-group">
				    <label for="alias">Количество</label>
				    <input type="text" class="form-control" id="alias" name="count" placeholder="Введите необходимое количество товара">
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