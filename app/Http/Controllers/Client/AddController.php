<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\OrderDetalsAddRequest;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Auth;
use App\User;
use App\Client;
use App\Sale;
use App\Staff;
use App\Branch;
use App\Product;
use App\Order;
use App\DetalsOfOrder;

class AddController extends Controller
{
	protected  $client;
	 protected $message;
    protected $header;
    
    
    public function __construct() {
    	 $this->client=Client::where('user_id',Auth::id())->first();
    	$this->header = 'Hello World!!!';
    	$this->message = 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
         /* $this->middleware('auth');*/
    }
    
    
     public function showOrders() {
        $user=Auth::user();
        $user_role=$user->role_id;
  	    $client_user_id=$this->client->user_id;
  	    $user_id=Auth::id();
  	    /*$orders=Order::select('id', 'created_at')->where('client_id',$client_id)->all();*/
  	    /*$orders=Client::all();*/
  	    $orders=$this->client->orders;
  	   
  	    if($user_role!=1) {
  	    	
			  return redirect('/')->with('message', 'Нет прав для посещения данной страницы');
			  
		
		    }
		    else {
		    	
		    	return view ('orders')->with(['message'=>$this->message,
		                                 'header' =>$this->header,
		                                 'orders'=>$orders,
		                                 'client'=>$this->client,
		                                    ]);
				
			}                             
	                                  
	}
	
	
	 public function addOrder() {
  	      
  	       $client_id=$this->client->id;
		   Order::create([
		   'client_id'=>$client_id,
		   ]);                             
	                                  
	}
	
	
	
	public function showOrderDetals($id) {
		  $order=Order::/*select('id')->*/where('id',$id)->first();
		  $order_id=Order::select('id')->where('id',$id)->first();
  	      $order_detals=$order->detalsoforders; 
  	      dump($order_id);
  	       $user_id=Auth::id();
  	      $order_id=Order::select('id')->where('id',$id)->first();
	  	  dump(Auth::user()->role_id);
	  	  $order=Order::/*select('id')->*/where('id',$id)->first();
  	      $order_detals=$order->detalsoforders;
  	      $client_id=$this->client->id;
  	      $order_client_id=$order->client_id;
	  	  $sale_id=Sale::select('id')->where('id',$id)->first();
	  		
	  	   if($order_client_id!=$client_id) {
  	        	
  	        	return redirect('client/page/Orders')->with('message', 'Нет прав для посещения данной страницы');
				
  	     
		   }   
  	      	
  	      	else {
  	      		
				 return view ('order-detals')->with(['message'=>$this->message,
		                                 'header' =>$this->header,
		                                 'order_detals'=>$order_detals,
		                                 'order_id'=>$order_id,
		                                  'client'=>$this->client,
		                                    ]);        
			}
  	        
  	           
	}
	
    
    
  public function addOrderDetals($id) {
	  	/*$client=Client::select('id')->where('user_id',Auth::id())->first();
	  		 dump($client->id);*/ 
	  		 
	  	  $order_id=Order::select('id')->where('id',$id)->first();
	  	  dump(Auth::user()->role_id);
	  	  $order=Order::/*select('id')->*/where('id',$id)->first();
  	      $order_detals=$order->detalsoforders;
  	      $client_id=$this->client->id;
  	      $order_client_id=$order->client_id;
	  	  $sale_id=Sale::select('id')->where('id',$id)->first();
	  		
	  	   if($order_client_id!=$client_id) {
  	        	
  	        	return redirect('client/page/Orders')->with('message', 'Нет прав для посещения данной страницы');
				
  	     
		   }   
		   else {
		   	
		   
			return view ('add-order-detals')->with(['message'=>$this->message,
			                                 'header' =>$this->header,
			                                 'order_id'=>$order_id,
			                                  'client'=>$this->client,
			                                 
			                                    ]);
		     }                            
	                                  
	}
	
	public function storeOrderDetals(OrderDetalsAddRequest $request, $id) {
	 
  	    $client_id=$this->client->id;
		$model=$request->id;
	    $count=$request->count;
	    $product=Product::where('model_id',$model)->first();
		$max=Product::where('model_id',$model)->max('quantity');
		$quantity=$product->quantity;
		$max_id=$product->id;
		$new_quantity=$quantity-$count;
		$branch_id=$product->branch_id;
		if($count>$max){
			
			return redirect()->back()->with('message', 'Нет достаточного количества товара');
         }
		else{
			 DetalsOfOrder::create([
		   'order_id'=>$id,
		   'branch_id'=>$branch_id,
		   'quantity'=>$count,
		   'model_id'=>$model,
		   ]);  
		   
		   Product::where('id',$max_id)->update(['quantity'=>$new_quantity]);
		   
		   
		        
		         return redirect()->back()->with('message', 'Продукт добавлен в заказ');              
		}
		
		
		/*if($user_role!=1) {
		
		return redirect()->back()->with('message', 'Войдите как клиент');
	
		
		}
		  else {
		  	dump($request);
		  }
	*/
		
		/*return view ('add-order')->with(['message'=>$this->message,
		                                 'header' =>$this->header,
		                                    ]);*/
		
		/*if($validator->fails()) {
			$this->throwValidationExeption($request, $validator);
			}*/
	
		/*dump($request->all());*/
		
	}
	
	
	
	 public function showProfile() {
	 
  	    $client_user_id=$this->client->user_id;
  	    $user_id=Auth::id();
  	    
  	     if($user_id=$client_user_id) {
			return view ('show-profile')->with(['message'=>$this->message,
			                                 'header' =>$this->header,
			                                 'client'=>$this->client,
			                                    ]);
			                                    
			                                    
			 }
		    else {
		    	
		    	return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
				
			}                             
	                   
		                                 
	                                  
	}
	
	public function updataProfile() {
	  	  
  	   
  	  
			return view ('updata-profile')->with(['message'=>$this->message,
			                                 'header' =>$this->header,
			                                 'client'=>$this->client,
			                                    ]);
			                                    
			                                    
		}	                                    
			                                    
		public function storeProfile() {

  	   
  	  
			return view ('updata-profile')->with(['message'=>$this->message,
			                                 'header' =>$this->header,
			                                 'client'=>$this->client,
			                                    ]);	                                    
			                                    
			                                    
		
		                           
	                                                       
		                                 
	                                  
	}
	
	
	
}
