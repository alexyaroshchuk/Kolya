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
          <h5 align="center">Отделение №:</h5> 
          <hr>
        </div>
        
        <div class="col-md-2" >
          <h5 align="center">Город:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Улица:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Дом №:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Активно:</h5> 
          <hr>
        </div>
        
         <div class="col-md-2" >
          <h5 align="center">Изменить:</h5> 
          <hr>
        </div>
       @foreach($branches as $branch)
      
     <div class="col-md-2">
          <h5 align="center">{{ $branch->id}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center">{{ $branch->city}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center">{{ $branch->streat}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center">{{ $branch->housenumber}}</h5>       
          <hr>
        </div>
        
        <div class="col-md-2">
          <h5 align="center"> @if($branch->active!=true) Нет @else Да @endif</h5>       
          <hr>
        </div>
        
         <div class="col-md-2">
         <p align="center"><a class="btn btn-primary btn-sm" href="{{route('updateBranch', ['id'=>$branch->id]) }}" role="button">Изменить</a></p>   
          <hr>
        </div>
      
      @endforeach
       
  
			
				
				<div class="col-md-12" align="right">
				   <p><a class="btn btn-default" href="{{ route('addBranch') }}" role="button">Добавить отделение &raquo;</a></p>
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
