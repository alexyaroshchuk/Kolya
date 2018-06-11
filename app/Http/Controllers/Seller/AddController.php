<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaleDetalsAddRequest;
use App\Staff;
use Auth;
use App\User;
use App\Product;
use App\Sale;
use App\DetalsOfSale;


class AddController extends Controller
{
   protected  $staff;
   
    public function __construct() {
    	
    	 $this->staff=Staff::where('user_id',Auth::id())->first();
    	$this->middleware('auth');
    }
    
    public function showSales() {

  	    $staff_user_id=$this->staff->user_id;
  	    $user=Auth::user();
  	    $user_role=$user->role_id;
  	    $user_id=Auth::id();
  	    
  	    $sales=$this->staff->sales;
  	 
  	    
  	    
  	   if($user_id!=$staff_user_id || $user_role!=2 ) {
			
	       return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
		    }
		    else {
		    	return view ('seller/sales')->with([
		                                 'sales'=>$sales,
		                                 'staff'=>$this->staff,
		                                    ]);
		    	
				
			}                             
	                                
	}
	
	public function addSale() {
  	      
  	       $staff_id=$this->staff->id;
		   Sale::create([
		   'staff_id'=>$staff_id,
		   ]);     
		   
		   return redirect()->back()->with('message', 'Продажа добавлена');                        
	                                  
	}
	
	
	public function showSaleDetals($id) {
		  $sale=Sale::/*select('id')->*/where('id',$id)->first();
		  $sale_id=sale::select('id')->where('id',$id)->first();
  	      $sale_detals=$sale->detalsofsales;
  	      $staff_id=$this->staff->id;
  	      $sale_staff_id=$sale->staff_id;
  	     /* dump($sale_staff_id);
  	      dump($staff_id);*/
  	        if($sale_staff_id!= $staff_id) {
  	        	
  	        	return redirect('seller/page/Sales')->with('message', 'Нет прав для посещения данной страницы');
				
  	     
		   }   
		  else   {
		  	 return view ('seller/sale-detals')->with([
		                                 'sale_detals'=>$sale_detals,
		                                 'sale_id'=>$sale_id,
		                                  'staff'=>$this->staff,
		                                    ]); 
		  }                                         
	}
	
	 public function addSaleDetals($id) {
	  	/*$client=Client::select('id')->where('user_id',Auth::id())->first();
	  		 dump($client->id);*/ 
	  		  $sale=Sale::/*select('id')->*/where('id',$id)->first();
		  $sale_id=sale::select('id')->where('id',$id)->first();
  	      $sale_detals=$sale->detalsofsales;
  	      $staff_id=$this->staff->id;
  	      $sale_staff_id=$sale->staff_id;
	  	  $sale_id=Sale::select('id')->where('id',$id)->first();
	  		dump(Auth::user()->role_id);
	  	   
	  	   if($sale_staff_id!= $staff_id) {
  	        	
  	        	return redirect('seller/page/Sales')->with('message', 'Нет прав для посещения данной страницы');
				
  	     
		   }   
		   else {
		   	
			return view ('seller/add-sale-detals')->with([
			                                 'sale_id'=>$sale_id,
			                                  'staff'=>$this->staff,
			                                 
			                                    ]);
		                                 
	        }                          
	}
	
	public function storeSaleDetals(SaleDetalsAddRequest $request, $id) {
	 
  	    $staff_id=$this->staff->id;
  	    $staff_branch_id=$this->staff->branch_id;
		$model=$request->id;
	    $count=$request->count;
	    /*$product=Product::where('model_id',$model)->first();*/
		$product=Product::where('model_id',$model);
		$branch_product=$product->where('branch_id', $staff_branch_id)->first();
		
		if(!$branch_product){
			return redirect()->back()->with('message', 'Нет товара');
			
         }
		else{ 
		$quantity=$branch_product->quantity;
		$branch_product_id=$branch_product->id;
		$new_quantity=$quantity-$count;
		if($count>$quantity) {
	return redirect()->back()->with('message', 'Нет достаточного количества товара');
	}
		
		else {
			
			
			 DetalsOfSale::create([
		   'sale_id'=>$id,
		   'quantity'=>$count,
		   'model_id'=>$model,
		   ]);  
		   
		   Product::where('id',$branch_product_id)->update(['quantity'=>$new_quantity]);
		   
		   
		        
		         return redirect()->back()->with('message', 'Продукт добавлен в заказ'); 
		}
			             
		}
		
    }
}
