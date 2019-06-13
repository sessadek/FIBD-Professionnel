<?php

namespace Fibd\Front\App\Http\Middleware;

use Closure;

class Locale
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next) {
    $langNav = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);


    echo('<pre>te2');
    print_r(session()->get('data'));
    echo('</pre>');
    exit;
    if ($request->method() === 'GET') {
      $segment = $request->segment(1);

      if($segment !== 'fr' && $segment !== 'en'){

        if(session()->get('locale') !== ''){

          $locale = session()->get('locale');
          app()->setLocale($locale);
          $segments = $request->segments();
          $segments = array_prepend($segments, $locale);

          return redirect()->to(implode('/', $segments));
        }

        if (!in_array($segment, config('app.locales'))) {
          $segments = $request->segments();
          // $fallback = session('locale') ?: config('app.fallback_locale');
          $fallback = session('locale') ?  : $langNav;
          $segments = array_prepend($segments, $fallback);
          session(['locale' => $langNav]);

          return redirect()->to(implode('/', $segments));
        }

        session(['locale' => $segment]);

        app()->setLocale($segment);
    } else {
      // if(session()->get('locale') !== ''){
      //
      //   $locale = session()->get('locale');
      //   app()->setLocale($locale);
      //   $segments = $request->segments();
      //   $segments = array_prepend($segments, $locale);
      //
      //   return redirect()->to(implode('/', $segments));
      // }
        app()->setLocale($segment);
        session(['locale' => $segment]);
        return $next($request);
    }
  }
    return $next($request);

  }
}
