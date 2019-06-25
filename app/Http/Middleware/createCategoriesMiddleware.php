<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class createCategoriesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() == 0){

            Session()->flash('error', 'You must create category first to add a post');
            return redirect()->back();
        }
        
        return $next($request);
    }
}
