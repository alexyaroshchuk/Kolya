 @extends('layouts.site')
 
 @section('content')
 
 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      
       <h1 align="center"> {{ $model->type }} {{ $model->brand }} {{ $model->model }}</h1>

        <p>{{ $message }}</p>
       
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
      @if($model)
      
       <div class="col-md-6">
          <h3 align="center">Тип товара:</h3>
          <h3 align="center">Бренд:</h3>
          <h3 align="center">Модель:</h3>
          <h3 align="center">Цена:</h3>
          <h3 align="center">Цвет:</h3>
          <h3 align="center">Гарантия:</h3>
         
        </div>
      
      <div class="col-md-6">
          <h3 align="center">{{ $model->type }}</h3>
          <h3 align="center">{{ $model->brand }}</h3>
          <h3 align="center">{{ $model->model }}</h3>
          <h3 align="center">{{ $model->price }}</h3>
          <h3 align="center">{{ $model->color }}</h3>
          <h3 align="center">{{ $model->guarantee }} мес.</h3>
         
        </div>
        
         <div class="col-md-12">
          <h3 align="center">Код товара: {{ $model->id }}</h3>
       
         
        </div>
      
      @endif
      
      </div>

      <hr>

      <footer>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->
    
    @endsection