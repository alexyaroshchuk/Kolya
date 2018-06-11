<?php

namespace App\Http\Controllers\Director;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBranchRequest;
use App\Http\Requests\StoreUpdateBranchRequest;
use App\Branch;
use App\Staff;
use Auth;
use App\User;

class BranchController extends Controller
{
	protected  $staff;
   
    public function __construct() {
    	
    	 $this->staff=Staff::where('user_id',Auth::id())->first();
    	$this->middleware('auth');
    }
    
    public function showBranches() {

  	    $staff_user_id=$this->staff->user_id;
  	    $user_id=Auth::id();
  	    $user=Auth::user();
  	    $user_role=$user->role_id;
  	    $staff_branch=$this->staff->branch;
  	    $branches=Branch::all();
  	    
  	 
  	    
  	    
  	   if($user_id!=$staff_user_id || $user_role!=4) {
  	   	
			return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
		
		    }
		    else {
		    	
		    	return view ('director/branches')->with([
		                                 'branches'=>$branches,
		                                 'staff'=>$this->staff,
		                                    ]);
				
			} 
			
	}    
			
			
			
			public function addBranch() {
				 $staff_user_id=$this->staff->user_id;
				 $user_id=Auth::id();
  	             $user=Auth::user();
  	             $user_role=$user->role_id;
				if($user_id!=$staff_user_id || $user_role!=4) {
  	   	
			return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
		
		    }
		    else {
  	     
		    	return view ('director/add-branch');
		    	
		    	}
   
}

public function storeBranch(AddBranchRequest $request) {
  	       $city=$request->city;
  	       $streat=$request->streat;
  	       $housenumber=$request->housenumber;
		   Branch::create([
		   'city'=>$city,
		   'streat'=>$streat,
		   'housenumber'=>$housenumber,
		   ]);     
		   
		   return redirect()->back()->with('message', 'Отделение добавлено');                        
	                                  
	}

             public function updateBranch($id) {
  	           $branch=Branch::where('id', $id)->first();
  	           $staff_branch_id=$this->staff->branch_id;
  	           $branch_id=$branch->id;
  	           if($staff_branch_id!=$branch_id){
			   	
			   	return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
			   	
			   }
			   else {
			   	return view ('director/update-branch')->with([
		                                 'branch'=>$branch,
		                                    ]);
			   }
		    	

}

 public function storeUpdateBranch(StoreUpdateBranchRequest $request) {
 	          $branch_id=$request->id;
  	          $city=$request->city;
  	          $streat=$request->streat;
  	          $housenumber=$request->housenumber;
  	       if($request->active!=null){
  	       	  $active=true;
  	       	}
  	       	else {
				 $active=false;
			}
  	          
  	          Branch::where('id', $branch_id)->update([
  	                                                 'city'=>$city,
  	                                                  'streat'=>$streat,
  	                                                  'housenumber'=>$housenumber,
  	                                                  'active'=> $active,
  	          
  	                                                    ]);
  	                                                    
  	                                                    
  	          return redirect()->back()->with('message', 'Информация обновлена');         

    }


}
