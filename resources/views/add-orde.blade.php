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
    <div class="alert alert-success">
    	{{ session('message') }}	
    </div>
    @endif
    
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">

			<div class="form-inline">
			 
				<form method="POST" action="{{route('storeOrder')}}" id="input-form">
				
				 <div class="col-md-6">
				  <div class="form-group">
				  
				    <label for="title">Идентификатор товара</label>
				    <input type="text" class="form-control" id="title" name="product[1][id]" placeholder="Идентификатор">
				 
				  </div>
				   </div>
				   <div class="col-md-6">
				  <div class="form-group">
				    <label for="alias">Количество товара</label>
				    <input type="text" class="form-control" id="alias" name="product[1][count]" placeholder="Количество">
				  </div>
				 <button type="submit" class="btn btn-default">Submit</button>
				   </div>
				  <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
                 <a style="color:green;" onclick="return addField()" href="#">[+]</a>
     
                 
                 
                 
                 
                   {{ csrf_field() }}
              </form> 
               
				   </div>
  
   </div>
				
    
			
	        </div>
	       
	        
	    
	       
    
      <div class="text-right">

 </div>
 
 <!--<div id="parentId">
 <div class="col-md-6">
				  <div class="form-group">
				  
				    <label for="title">Идентификатор товара</label>
				    <input type="text" class="form-control" id="title" name="title" placeholder="Идентификатор">
				 
				  </div>
				   </div>
    <select size="1" name="type[1]" style="width:150px;">
      <option value="text">Текстовое поле</option>
      <option value="int">Целое число</option>
      <option value="float">Число-цена</option>
    </select>
    <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
    <input name="url[1]" type="text" style="width:300px;" />
    <a style="color:green;" onclick="return addField()" href="#">[+]</a>
  </div>
</div>-->

<!-- <div class="row">

			<div>
			<div class="form-inline" id="per">
			 
				<form method="POST" action="{{route('storeOrder')}}" id="input-form">
				<div>
   <div class="form-group">
    <input name="namer[]" type="text" style="width:300px;" />
    </div>
     <div class="form-group">
    <input name="name[]" type="text" style="width:300px;" />
    
     </div>
     <a style="color:red;" onclick="return deleteField(this)" href="#">[—]</a>
    <a style="color:green;" onclick="return addField()" href="#">[+]</a>
     
      {{ csrf_field() }}
  
   </div>
   </div>-->
   
   
  

<script>
var countOfFields = 1; // Текущее число полей
var curFieldNameId = 1; // Уникальное значение для атрибута name
var maxFieldLimit = 25; // Максимальное число возможных полей
function deleteField(a) {
  if (countOfFields > 1)
  {
 // Получаем доступ к ДИВу, содержащему поле
 var contDiv = a.parentNode;
 // Удаляем этот ДИВ из DOM-дерева
 contDiv.parentNode.removeChild(contDiv);
 // Уменьшаем значение текущего числа полей
 countOfFields--;
 }
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
function addField() {
 // Проверяем, не достигло ли число полей максимума
 if (countOfFields >= maxFieldLimit) {
 alert("Число полей достигло своего максимума = " + maxFieldLimit);
 return false;
 }
 // Увеличиваем текущее значение числа полей
 countOfFields++;
 // Увеличиваем ID
 curFieldNameId++;
 // Создаем элемент ДИВ
 var div = document.createElement("div");
 // Добавляем HTML-контент с пом. свойства innerHTML
 div.innerHTML = " <div class=\"col-md-6\"><div class=\"form-group\"><label for=\"title\">Идентификатор товара</label><input type=\"text\" class=\"form-control\" id=\"title\" name=\"product[" + curFieldNameId + "][id]\" placeholder=\"Идентификатор\"></div></div><div class=\"col-md-6\"><div class=\"form-group\"><label for=\"alias\">Количество товара</label><input type=\"text\" class=\"form-control\" id=\"alias\" name=\"product[" + curFieldNameId + "][count]\" placeholder=\"Количество\"></div></div><a style=\"color:red;\" onclick=\"return deleteField(this)\" href=\"#\">[—]</a><a style=\"color:green;\" onclick=\"return addField()\" href=\"#\">[+]</a>";
 // Добавляем новый узел в конец списка полей
 document.getElementById("input-form").appendChild(div);
 // Возвращаем false, чтобы не было перехода по сслыке
 return false;
}
</script>
      <hr>

      <footer>
        <p>&copy; 2018 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->

@endsection