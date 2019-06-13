<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Pub;
use Fibd\Front\App\Publicite;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class HeaderController extends Controller
{
  public function displayPub(Request $request){

  }

  public function displayBanniere(Request $request){
  
    $publicite = Publicite::where([
      ['id_primaire', $request['id_categoriePage']],
      ['table_primaire', 'bo_sites_categories'],
      ])->get();

    if(count($publicite) > 0){
      $pub = $publicite[0]->pub;
      $banniere = [];
    } else {
      $banniere = SiteCategorie::where('id_categoriePage', $request['id_categoriePage'])->get();
      $pub = 0;
    }

    $view = View::make('front::includes.banniere', compact('banniere', 'pub'));
    $render = $view->render();

    return $view;
  }
}
