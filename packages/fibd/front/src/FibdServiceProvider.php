<?php

namespace Fibd\Front;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\MetaData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class FibdServiceProvider extends ServiceProvider
{
  public $ok_cookie = false;
  /**
  * Bootstrap services.
  *
  * @return void
  */
  public function boot(Request $request)
  {
    include __DIR__.'/routes/web.php';
    $controlCookie = $request->cookie('Fibd2019');
    $_SESSION['ok_cookie'] = false;
    if($controlCookie != ''){
      $this->ok_cookie = true;
      $_SESSION['ok_cookie'] = true;
    }

    $menu = SiteCategorie::where('delete_categoriePage', 0)->where('is_header_categoriePage', 1)->orderBy('ordre_categoriePage', 'asc')->get();
    $footer = SiteCategorie::where('delete_categoriePage', 0)->where('is_footer_categoriePage', 1)->orderBy('ordre_categoriePage', 'asc')->get();
    $headerlink = DB::table('bo_sites_header_links')->where('active_headerLink', 1)->where('delete_headerLink', 0)->orderBy('ordre_headerLink', 'asc')->get();
    $headerlinkMobile = DB::table('bo_sites_header_links')->where('use_mobile_linkHeader', 1)->where('active_headerLink', 1)->where('delete_headerLink', 0)->orderBy('ordre_headerLink', 'asc')->get();
    if($request->path()!='banniere'){
      if($request->path()!='/'){
        $part=explode('/', $request->path());
        if(count($part)-1>0){
          $node_url='/'.$part[count($part)-1];
        }
        else{
          $node_url='/'.$part[0];
        }
      }
      else{
        $node_url=$request->path();
      }
      $metadata = MetaData::where('meta_url_canonical_metaData', $node_url)->get();
      if(isset($metadata[0])){
        View::share('metaData', $metadata);
      } else {
        $metadata = [];
        View::share('metaData', $metadata);
      }

    }


    $cookie = DB::table('bo_cookies_messages')->get();
    $this->loadViewsFrom(__DIR__.'/resources/views', 'front');
    View::share('menuHeader', $menu);
    View::share('headLink', $headerlink);
    View::share('headLinkMobile', $headerlinkMobile);
    View::share('menuFooter', $footer);
    View::share('Cookie', $cookie);
    View::share('okCookie', $this->ok_cookie);
    $this->loadTranslationsFrom(__DIR__.'/resources/lang', 'front');
  }

  /**
  * Register services.
  *
  * @return void
  */
  public function register()
  {
    //
  }


  public function controlRedirection(Request $request){

    $suite_url=($request->getQueryString()!='')?'?'.$request->getQueryString():'';
    $isControl = ($request->value_server)?0:1;
    $suite_url .= ($request->value_server)?str_replace('&value_server=true','',$suite_url):'';

    $redirection = DB::table('bo_sites_redirections')
    ->where('init_url_redirectionUrl','=' ,$request->path().$suite_url)
    ->where('final_url_redirectionUrl', 'not like', "")
    ->orWhere('init_url_redirectionUrl', '/'.$request->path().$suite_url)
    ->where('is_control_redirectionUrl', $isControl)
    ->get();
    if(isset($redirection[0])){

        header('Location: '.$redirection[0]->final_url_redirectionUrl);

      exit;
    } else {

      if(strpos($request->path(), ',') > 0){
        header('Location:https://archives.bdangouleme.com/'.$request->path());
        exit;
      }
    }
    return false;
  }
}
