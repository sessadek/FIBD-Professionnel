<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Actualite;


class ActualitesController extends Controller
{
  public function listActualites($path) {

    $choice = SiteCategorie::where('url_categoriePage', '/'.$path)->get();
    $actualites =Actualite::where('delete_actualite', 0)->where('actif_actualite', 1)->orderBy('date_start_actualite', 'desc')->orderBy('heure_start_actualite', 'desc')->get();

    return ['choice' => $choice, 'actualites' => $actualites];
  }

  public function savoir(Request $request){
    $part = explode('/', $request->path());
    $breadcrumb = [];
    $url = '';
    $file = [];

    foreach ($part as $value) {
      $name = SiteCategorie::where('url_categoriePage', '/'.$value)->get();
      if(count($name) !== 0 ) {
        $url = $url.'/'.$value;
        $file['name'] = $name[0]->titre_categoriePage;
        $file['url'] = $url;
        array_push( $breadcrumb, $file);
      }
    }
    $actualiteDetail =Actualite::where('url_canonical_actualite', '/'.$part[count($part)-1])->get();

    return view('front::pages.actualite.ActualiteDetail', compact('actualiteDetail', 'breadcrumb'));
  }

}
