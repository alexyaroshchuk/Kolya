@extends('layouts.site')

@section('content')

<div class="jumbotron">
      <div class="container">
        <h1>{{$header}}</h1>
        <p>{{$message}}</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
    
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
			
				<form method="POST" action="{{route('storeProfile')}}">
				  <div class="form-group">
				    <label for="title">Имя</label>
				    <input type="text" class="form-control" id="title" name="firstname" placeholder="Введите код товара">
				  </div>
				  <div class="form-group">
				    <label for="alias">Фамилия</label>
				    <input type="text" class="form-control" id="alias" name="lastname" placeholder="Введите необходимое количество товара">
				  </div>
				  <div class="form-group">
				    <label for="alias">Телефон</label>
				    <input type="text" class="form-control" id="alias" name="phonenumber" placeholder="Введите необходимое количество товара">
				  </div>
				  <div class="form-group">
				    <label for="alias">Город</label>
				    <input type="text" class="form-control" id="alias" name="city" placeholder="Введите необходимое количество товара">
				  </div>
				  <div class="form-group">
				    <label for="alias">Улица</label>
				    <input type="text" class="form-control" id="alias" name="streat" placeholder="Введите необходимое количество товара">
				  </div>
				   <div class="form-group">
				    <label for="alias">Номер дома</label>
				    <input type="text" class="form-control" id="alias" name="housenumber" placeholder="Введите необходимое количество товара">
				  </div>
				  
				  <button type="submit" class="btn btn-default">Обновить</button>
				  
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