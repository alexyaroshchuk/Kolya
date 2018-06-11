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
			
				<form method="POST" action="{{route('storeStaffAccount')}}">
				 <div class="form-group">
				    <label for="title">Логин</label>
				    <input type="text" class="form-control" id="title" name="login" placeholder="Введите логин">
				  </div>
				  <div class="form-group">
				    <label for="alias">Email</label>
				    <input type="email" class="form-control" id="alias" name="email" placeholder="Введите адрес электронной почты">
				  </div>
				   <div class="form-group">
				    <label for="alias">Пароль</label>
				    <input type="password" class="form-control" id="alias" name="password" placeholder="Введите пароль">
				  </div>
				   <div class="form-group">
				    <label for="title">Повторите пароль</label>
				    <input type="password" class="form-control" id="title" name="password_confirmation" placeholder="Повторите пароль">
				  </div>
				   </div>
				   <div class="form-group">
				    <input type="hidden" class="form-control" id="alias" name="id"  value= {{$staff->id}}>
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