<?php

namespace App\Http\Controllers\Picker;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddWaybillRequest;
use App\Http\Requests\WaybillDetalsAddRequest;
use App\Staff;
use Auth;
use App\User;
use App\Product;
use App\Waybill;
use App\ContentOfWaybill;

class AddController extends Controller
{
    protected  $staff;
   
    public function __construct() {
    	
    	 $this->staff=Staff::where('user_id',Auth::id())->first();
    	$this->middleware('auth');
    }
    
    public function showWaybills() {

  	    $staff_user_id=$this->staff->user_id;
  	    $user_id=Auth::id();
  	    $user=Auth::user();
  	    $user_role=$user->role_id;
  	    $waybills=$this->staff->waybills;
  	    
  	 
  	    
  	    
  	   if($user_id!=$staff_user_id || $user_role!=3) {
  	   	
			return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
		
		    }
		    else {
		    	
		    	return view ('picker/waybills')->with([
		                                 'waybills'=>$waybills,
		                                 'staff'=>$this->staff,
		                                    ]);
				
			} 
			
			}     
			
			public function addWaybill(AddWaybillRequest $request) {
  	      $provider_id=$request->provider;
  	      dump($provider_id);
  	       $staff_id=$this->staff->id;
		   Waybill::create([
		   'provider_id'=>$provider_id,
		   'staff_id'=>$staff_id,
		   
		   ]);     
		   
		   return redirect()->back()->with('message', 'Продажа добавлена');                        
	                                  
	}           
	
	public function showWaybillDetals($id) {
		  $waybill=Waybill::where('id',$id)->first();
		  $waybill_id=Waybill::select('id')->where('id',$id)->first();
  	      $waybill_detals=$waybill->contentofwaybills;
  	      $staff_id=$this->staff->id;
  	      $waybill_staff_id=$waybill->staff_id;
  	      dump( $waybill_detals);
  	      
  	      
  	     /* dump($sale_staff_id);
  	      dump($staff_id);*/
  	        if($waybill_staff_id!=$staff_id) {
  	        	
  	        	return redirect('picker/page/Waybill')->with('message', 'Нет прав для посещения данной страницы');
				
  	     
		   }   
		  else   {
		  	 return view ('picker/waybill-detals')->with([
		                                 'waybill_detals'=>$waybill_detals,
		                                 'waybill_id'=>$waybill_id,
		                                  'staff'=>$this->staff,
		                                    ]); 
		  }                                         
	}
	
	
	 public function addWaybillDetals($id) {
	  	/*$client=Client::select('id')->where('user_id',Auth::id())->first();
	  		 dump($client->id);*/ 
	  	  $waybill=Waybill::/*select('id')->*/where('id',$id)->first();
		  $waybill_id=Waybill::select('id')->where('id',$id)->first();
  	      $waybill_detals=$waybill->contentofwaybills;
  	      $staff_id=$this->staff->id;
  	      $waybill_staff_id=$waybill->staff_id;
	  	  $waybill_id=Waybill::select('id')->where('id',$id)->first();
	  		dump(Auth::user()->role_id);
	  	   
	  	   if($waybill_staff_id!=$staff_id) {
  	        	
  	        	return redirect('picker/page/Waybills')->with('message', 'Нет прав для посещения данной страницы');
				
  	     
		   }   
		   else {
		   	
			return view ('picker/add-waybill-detals')->with([
			                                 'waybill_id'=>$waybill_id,
			                                  'staff'=>$this->staff,
			                                 
			                                    ]);
		                                 
	        }                          
	}
	
	public function storeWaybillDetals(WaybillDetalsAddRequest $request, $id) {
	 
  	    $staff_id=$this->staff->id;
  	    $staff_branch_id=$this->staff->branch_id;
		$model=$request->id;
	    $count=$request->count;
	    /*$product=Product::where('model_id',$model)->first();*/
		$product=Product::where('model_id',$model);
		$branch_product=$product->where('branch_id', $staff_branch_id)->first();
		
		if(!$branch_product){
			return redirect()->back()->with('message', 'Нет указанного товара');
			
         }
		else{ 
		$quantity=$branch_product->quantity;
		$branch_product_id=$branch_product->id;
		$new_quantity=$quantity+$count;
			
			ContentOfWaybill::create([
		   'waybill_id'=>$id,
		   'quantity'=>$count,
		   'model_id'=>$model,
		   ]);  
		   
		   Product::where('id',$branch_product_id)->update(['quantity'=>$new_quantity]);
		   
		   
		        
		         return redirect()->back()->with('message', 'Продукт добавлен в заказ'); 
		
			             
		}
		
    }
}

	           
	                                
	
	

