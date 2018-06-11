 @extends('layouts.site')
 
 @section('content')
 
 <!-- Main jumbotron for a primary marketing message or call to action -->
  @if (session('message'))
    <div class="alert alert-danger">
    	{{ session('message') }}	
    </div>
    @endif
    
    <div class="jumbotron">
      <div class="container">
      
       <h1> {{ $header }}</h1>

        <p>{{ $message }}</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
      @foreach($models as $model)
      
      <div class="col-md-6">
          <h2> {{ $model->type->typename }} {{ $model->brand->brandname }} {{ $model->modelname}}</h2>
          <h4 align="center">  Цена:{{ $model->price }}  </h4>
          <p><a class="btn btn-default" href="{{ route('productShow', ['id'=>$model->id]) }}" role="button">Подробнее &raquo;</a></p>
        </div>
      
      @endforeach
      
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->
    
     @endsection