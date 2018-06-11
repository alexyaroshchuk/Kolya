<?php

namespace App\Http\Controllers;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Client;
use App\Model_;
use App\Type;
use App\Brand;
use DB;
use Auth;

class IndexController extends Controller
{

     protected $message;
    protected $header;
      protected $staff;
    
    
    public function __construct() {
    	
    	$this->header = 'Hello World!!!';
    	$this->message = 'This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.';
         
    }
    
    
    public function index () {
    	 $client=Client::where('user_id',Auth::id())->first(); 
    	
  	    $user_id=Auth::id();
        $models=Model_::all();

		return view('page')->with(['message'=>$this->message,
		                           'header' =>$this->header,
		                           'models'=>$models,
		                           'client'=>$client,
		                           ]);
	}
	
	
	public function show($id){
		 $client=Client::where('user_id',Auth::id())->first();
		/*//DB::disableQueryLog();
		$client=Client::find(1);
		//$product = Product::where('id', '=', $id) -> first();
        $orders= $client->orders();
	  //  dump($client->orders);*/
	/*$model = Model_::select(['id', 'modelname', 'size', 'color', 'guarantee', 'price'])->where('id',$id)->first();*/
	$model=DB::table('models')
	->leftJoin('types', 'models.type_id', '=', 'types.id')
	->leftJoin('brands', 'models.brand_id', '=', 'brands.id')
	->select('models.modelname as model','models.id as id', 'models.size as size', 'models.price as price', 'models.guarantee as guarantee', 'models.color as color', 'types.typename as type', 'brands.brandname as brand')
	->where('models.id',$id)
	->first();		
	 
	 
	 return view('show-product')->with(['message'=>$this->message,
		                           'header' =>$this->header,
		                           'model'=>$model,
		                           'client'=>$client,
		                           ]);
		                         
	}
	
	
	
	 
}
