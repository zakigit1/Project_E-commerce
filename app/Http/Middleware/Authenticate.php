<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // return $request->expectsJson() ? null : route('login');


        #========================================================================================#

        # We adds this codes here : 
        ## Method 1 :

        // return (!$request->expectsJson()) ? ($request->is('admin/*') ?  route('login'):route('get.login') ) : null;
        
        ## Method 2 :

        if(!($request->expectsJson())){

            if($request->is('admin')){

                return route('get.login');

            }else{

                return route('login');
                
            }
            
        }else{
            return null;
        }




        // if($request->expectsJson()=='admin/*'){
        //     return route('get.login');
        // }else{
        //     return route('login');
        // }





    }
}
