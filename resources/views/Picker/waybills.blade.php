 @extends('Picker.layouts.site')
 
 @section('content')
 <!-- Main jumbotron for a primary marketing message or call to action -->
   

    <div class="container">
      <!-- Example row of columns -->
      <div class="row"> 
      
       @if (session('message'))
    <div class="alert alert-danger">
    	{{ session('message') }}	
    </div>
    @endif
      
       @foreach($waybills as $waybill)
      
     <div class="col-md-6">
          <h2>Накладная от {{ $waybill->created_at }}</h2>
           <p><a class="btn btn-default" href="{{ route('waybillDetalsShow', ['id'=>$waybill->id]) }}" role="button">Подробнее &raquo;</a></p>
            <p><a class="btn btn-default" href="{{ route('addWaybillDetals', ['id'=>$waybill->id]) }}" role="button">Добавить товар &raquo;</a></p>
         
          <h4 align="center"></h4>
          
         
          <hr>
        </div>
      
      @endforeach
       
      <div class="form">
			
				<form method="POST" action="{{route('storeWaybill')}}">
				<div class="col-md-7" align="right">
				  <div class="form-group">
				    <input type="text" class="form-control" id="title" name="provider" placeholder="Введите идентификатор поставщика">
				  </div>
				  </div>
				  <div class="col-md-5" align="left">
				  <button type="submit" class="btn btn-default">Добавить накладную</button>
				  
				   {{ csrf_field() }}
				    </div>
				    
				</form>
      
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
