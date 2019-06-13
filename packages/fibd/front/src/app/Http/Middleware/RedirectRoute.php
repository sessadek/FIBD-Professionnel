<?php

namespace Fibd\Front\App\Http\Middleware;

use Closure;
use Fibd\Front\App\MetaData;

class RedirectRoute
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

      if($request->path() == '/'){
        $urlValue ='/';
      } else {
        $urlValue = substr($request->path(), 2);
      }

      $url = MetaData::where('meta_url_canonical_metaData', $urlValue)->where('delete_metaData', 0)->get();


      if(count($url) > 0){
        
        return $next($request);
      } else {

      return redirect()->route('404');
      }

}

}
