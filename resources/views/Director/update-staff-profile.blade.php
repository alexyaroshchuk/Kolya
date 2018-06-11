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
			
				<form method="POST" action="{{route('storeUpdateStaff')}}">
				  <div class="form-group">
				    <label for="title">Имя</label>
				    <input type="text" class="form-control" id="title" name="firstname" value={{$staff->firstname}}>
				  </div>
				  <div class="form-group">
				    <label for="alias">Фамилия</label>
				    <input type="text" class="form-control" id="alias" name="lastname" value={{$staff->lastname}}>
				  </div>
				   <div class="form-group">
				    <label for="alias">Пол</label>
				    <input type="text" class="form-control" id="alias" name="sex" value={{$staff->sex}}>
				  </div>
				   <div class="form-group">
				    <label for="title">Дата рождения</label>
				    <input type="text" class="form-control" id="title" name="databirth" value={{$staff->databirth}}>
				  </div>
				  <div class="form-group">
				    <label for="alias">Номер телефона</label>
				    <input type="text" class="form-control" id="alias" name="phonenumber" value={{$staff->phonenumber}}>
				  </div>
				   <div class="form-group">
				    <label for="alias">Зарплата</label>
				    <input type="text" class="form-control" id="alias" name="salary" value={{$staff->salary}}>
				  </div>
				  <div class="form-group">
				    <label for="alias">Активен:</label>
				    <input type="checkbox" id="alias" name="active">
				  <h5 align="center">---Адрес---</h5>
				  <div class="form-group">
				    <label for="title">Город</label>
				    <input type="text" class="form-control" id="title" name="city" value={{$staff->city}}>
				  </div>
				  <div class="form-group">
				    <label for="alias">Улица</label>
				    <input type="text" class="form-control" id="alias" name="streat" value={{$staff->streat}}>
				  </div>
				   <div class="form-group">
				    <label for="alias">Дом №</label>
				    <input type="text" class="form-control" id="alias" name="housenumber" value={{$staff->housenumber}}>
				  </div>
				  
				   </div>
				   <div class="form-group">
				    <input type="hidden" class="form-control" id="alias" name="id"  value= {{$staff->id}}>
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