<?php

namespace App\Http\Controllers\Director;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddStaffRequest;
use App\Http\Requests\StoreUpdateStaffRequest;
use App\Http\Requests\StoreStaffAccountRequest;
use Illuminate\Support\Facades\Hash;
use App\Events\onStoreStaffAccountEvent;
use App\Branch;
use App\Staff;
use Auth;
use App\User;
use App\Role;
use Event;

class StaffController extends Controller
{
	
	protected  $director;
   
    public function __construct() {
    	
    	 $this->director=Staff::where('user_id',Auth::id())->first();
    	$this->middleware('auth');
    }
    
    public function showStaffs() {

  	    $director_user_id=$this->director->user_id;
  	    $user_id=Auth::id();
  	    $user=Auth::user();
  	    $user_role=$user->role_id;
  	    $director_branch_id=$this->director->branch_id;
  	    $branch=Branch::where('id', $director_branch_id)->first();
  	    $staffs=$branch->staffs;
  	 
  	    
  	    
  	   if($user_id!=$director_user_id || $user_role!=4) {
  	   	
			return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
		
		    }
		    else {
		    	
		    	return view ('director/staffs')->with([
		                                 'staffs'=>$staffs,
		                                 'director'=>$this->director,
		                                    ]);
				
			} 
			
	}    
	
				public function addStaff() {
					 $director_user_id=$this->director->user_id;
					 $user_id=Auth::id();
  	                 $user=Auth::user();
  	                 $user_role=$user->role_id;
					 if($user_id!=$director_user_id || $user_role!=4) {
  	   	
			return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
		
		    }
		    else {
				  	     
					return view ('director/add-staff');
			}
   
}

		      public function storeStaff(AddStaffRequest $request) {
		  	       $city=$request->city;
		  	       $streat=$request->streat;
		  	       $housenumber=$request->housenumber;
		  	       $firstname=$request->firstname;
		  	       $lastname=$request->lastname;
		  	       $sex=$request->sex;
		  	       $databirth=$request->databirth;
		  	       $salary=$request->salary;
		  	       $phonenumber=$request->phonenumber;
		  	       $place_id=$request->place_id;
		  	       $branch_id=$this->director->branch_id;
		  	       dump($place_id);
		  	       
		  	       
				   Staff::create([
				   'city'=>$city,
				   'streat'=>$streat,
				   'housenumber'=>$housenumber,
				   'firstname'=>$firstname,
				   'lastname'=>$lastname,
				   'sex'=>$sex,
				   'databirth'=>$databirth,
				   'salary'=>$salary,
				   'place_id' => $place_id,
				   'phonenumber'=>$phonenumber,
				   'branch_id'=>$branch_id,
				   
				   ]);     
				   
				   return redirect()->back()->with('message', 'Сотрудник добавлен');                        
	                                  
	}
	
	
			public function showProfile($id){
				
		    $staff=Staff::where('id', $id)->first();
		    $staff_branch_id=$staff->branch_id;
			$director_branch_id=$this->director->branch_id;
			$staff_place=$staff->place->place_name;
			$staff_branch_id=$staff->branch_id;
			$director_branch_id=$this->director->branch_id; 
			$user_id=Auth::id();
	  	    $user=Auth::user();
	  	    $user_role=$user->role_id;
			
			 if( $staff_branch_id!=$director_branch_id || $user_role!=4) {
	  	   	
				return redirect()->back()->with('message', 'Нет прав для посещения данной страницы');
			
			    }
			    
			    else {
			 
			 return view('director/show-staff-profile')->with([
				                           'staff'=>$staff,
				                           'staff_place'=>$staff_place,
				                           ]);
				   }
		                         
	}
	
	
		public function updateProfile($id) {
			             $staff=Staff::where('id', $id)->first();
			             $staff_branch_id=$staff->branch_id;
						 $director_branch_id=$this->director->branch_id;
						 $user_id=Auth::id();
	  	                 $user=Auth::user();
	  	                 $user_role=$user->role_id;
	  	                 
						 if( $staff_branch_id!=$director_branch_id || $user_role!=4) {
	  	   	
				return redirect('page/Staffs')->with('message', 'Нет прав для посещения данной страницы');
			
			    }
			    
			    else {
					  	     
						return view ('director/update-staff-profile')->with([
				                           'staff'=>$staff,
				                           ]);
				}
	   
	}
	
			public function storeUpdateStaff(StoreUpdateStaffRequest $request) {
		 	          $staff_id=$request->id;
		  	          $city=$request->city;
		  	          $streat=$request->streat;
		  	          $housenumber=$request->housenumber;
		  	          $firstname=$request->firstname;
		  	          $lastname=$request->lastname;
		  	          $sex=$request->sex;
		  	          $databirth=$request->databirth;
		  	          $salary=$request->salary;
		  	          $phonenumber=$request->phonenumber;
		  	          
		  	       if($request->active!=null){
		  	       	  $active=true;
		  	       	}
		  	       	else {
						 $active=false;
					}
		  	          
		  	          Staff::where('id', $staff_id)->update([
		  	                                                 'city'=>$city,
		  	                                                  'streat'=>$streat,
		  	                                                  'housenumber'=>$housenumber,
		  	                                                  'active'=> $active,
		  	                                                  'firstname'=>$firstname,
															   'lastname'=>$lastname,
															   'sex'=>$sex,
															   'databirth'=>$databirth,
															   'salary'=>$salary,
															   'phonenumber'=>$phonenumber,
															   'active' => $active
		  	          
		  	                                                    ]);
		  	                                                    
		  	                                                    
		  	          return redirect()->back()->with('message', 'Информация обновлена');         

		    }
		    
		    
		    public function addStaffAccount($id) {
	  	  $staff=Staff::where('id',$id)->first();
		  $staff_branch_id=$staff->branch_id;
  	      $director_branch_id=$this->director->branch_id;
		  $user_id=Auth::id();
	  	  $user=Auth::user();
	  	  $user_role=$user->role_id;
	  	   
	  	    if( $staff_branch_id!=$director_branch_id || $user_role!=4) {
	  	   	
				return redirect('page/Staffs')->with('message', 'Нет прав для посещения данной страницы');
			
			    }
			    
			    else {
		   	
			return view ('director/add-staff-account')->with([                         
			                                  'staff'=>$staff,
			                                 
			                                    ]);
		                                 
	        }                          
	}
	
	
	      public function storeStaffAccount(StoreStaffAccountRequest $request) {
	      	       $staff_id=$request->id;
	      	       $staff=Staff::where('id', $staff_id)->first();
	      	       $staff_place=$staff->place->place_name;
	      	       $staff_role=Role::where('name', $staff_place)->first();
	      	       $staff_role_id=$staff_role->id;
		  	       $login=$request->login;
		  	       $email=$request->email;
		  	       $password=$request->password;
		  	       $branch_id=$this->director->branch_id;
		  	       dump($staff_role_id);
		  	       
		  	       
				 $acc=User::create([
            'name' => $login,
            'email' => $email,
            'password' => Hash::make($password),
            'role_id' => $staff_role_id,
        ]);
        
        Event::fire(new onStoreStaffAccountEvent($acc, $staff));
				   
				/*   return redirect('director/page/Staffs')->with('message', 'Аккаунт создан');  */                      
	                                  
	}
   
}
