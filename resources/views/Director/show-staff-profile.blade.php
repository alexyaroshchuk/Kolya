 @extends('Director.layouts.site')
 
 @section('content')
 
 @if (session('message'))
    <div class="alert alert-success">
    	{{ session('message') }}	
    </div>
    @endif
 
 <!-- Main jumbotron for a primary marketing message or call to action -->
   
    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
    <hr>
      
       <div class="col-md-6">
          <h3 align="center">Имя:</h3>
          <hr>
          <h3 align="center">Фамилия:</h3>
          <hr>
          <h3 align="center">Должность:</h3>
          <hr>
          <h3 align="center">Пол:</h3>
          <hr>
          <h3 align="center">Дата рождения:</h3>
          <hr>
          <h3 align="center">Телефон:</h3>
          <hr>
          <h3 align="center">Зарплата:</h3>
          <hr>
          <h3 align="center">ИД отделения:</h3>
          <hr>
          <h3 align="center">Активен:</h3>
          <hr>
          <h3 align="center">Город:</h3>
          <hr>
          <h3 align="center">Улица:</h3>
          <hr>
          <h3 align="center">Дом №:</h3>
         
        </div>
      
      <div class="col-md-6">
          <h3 align="center">{{ $staff->firstname }}</h3>
          <hr>
          <h3 align="center">{{ $staff->lastname }}</h3>
          <hr>
          <h3 align="center">{{ $staff_place}}</h3>
          <hr>
          <h3 align="center">{{ $staff->sex}}</h3>
          <hr>
          <h3 align="center">{{ $staff->databirth}}</h3>
          <hr>
          <h3 align="center">{{ $staff->phonenumber }}</h3>
          <hr>
          <h3 align="center">{{ $staff->salary }}</h3>
          <hr>
          <h3 align="center">{{ $staff->branch_id }}</h3>
          <hr>
          <h3 align="center">@if($staff->active!=true) Нет @else Да @endif</h3>
          <hr>
          <h3 align="center">{{ $staff->city }}</h3>
          <hr>
          <h3 align="center">{{ $staff->streat }}</h3>
          <hr>
          <h3 align="center">{{ $staff->housenumber }}</h3>
         
        </div>
          
         <div class="col-md-12" align="center">
         <hr>
        <p><a class="btn btn-default btn-lg" href="{{ route('updateStaffProfile', ['id'=>$staff->id]) }}" role="button">Обновить информацию &raquo;</a></p>
         
        </div>
      
     
      
      </div>

      <hr>

      <footer>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->
    
    @endsection