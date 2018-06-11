 @extends('Director.layouts.site')
 
 @section('content')
 <!-- Main jumbotron for a primary marketing message or call to action -->
   

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
       @if (session('message'))
    <div class="alert alert-success">
    	{{ session('message') }}	
    </div>
    @endif
      <hr>
      <div class="col-md-2" >
          <h5 align="center">ИД сотрудника:</h5> 
          <hr>
        </div>
        
        <div class="col-md-2" >
          <h5 align="center">Имя:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Фамилия:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Телефон:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Активен:</h5> 
          <hr>
        </div>
        
         <div class="col-md-1" >
          <h5 align="center">Профиль:</h5> 
          <hr>
        </div>
        
        <div class="col-md-1" >
          <h6 align="center">Добавить аккаунт:</h6> 
          <hr>
        </div>
       @foreach($staffs as $staff)
      
     <div class="col-md-2">
          <h5 align="center">{{ $staff->id}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center">{{ $staff->firstname}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center">{{ $staff->lastname}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center">{{ $staff->phonenumber}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center"> @if($staff->active!=true) Нет @else Да @endif</h5>       
          <hr>
        </div>
        
         <div class="col-md-1">
         <p align="center"><a class="btn btn-primary btn-sm" href="{{route('showStaffProfile', ['id'=>$staff->id]) }}" role="button">Подробнее</a></p>   
          <hr>
        </div>
        
         <div class="col-md-1">
         @if (!$staff->user_id) 
		 	
         <p align="center"><a class="btn btn-primary btn-sm" href="{{route('addStaffAccount', ['id'=>$staff->id]) }}" role="button">Добавить</a></p>  
          @endif
          <hr>
        </div>
      
      @endforeach
       
  
			
				
				<div class="col-md-12" align="right">
				   <p><a class="btn btn-default" href="{{ route('addStaff') }}" role="button">Добавить сотрудника &raquo;</a></p>
				  </div>
				 
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
