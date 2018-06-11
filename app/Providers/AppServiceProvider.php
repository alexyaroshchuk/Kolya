<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use App\User;
use App\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       date_default_timezone_set('Europe/Kiev'); //
       
       
       User::created( function(User $user) {
       	if($user->role_id=1){
			Client::create([
			'user_id'=>$user->id,
			]);
		}
       	});
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     /* DB::listen(function ($query){
    	
    	dump($query->sql);
		
	});//*/
    }
    
    
}
