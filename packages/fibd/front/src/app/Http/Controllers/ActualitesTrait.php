<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Actualite;
use Illuminate\Support\Facades\DB;

trait ActualitesTrait
{
  public function listActualites($path) {

    $choice = SiteCategorie::where('url_categoriePage', '/'.$path)->get();
    $actualites =Actualite::where('delete_actualite', 0)->where('actif_actualite', 1)->orderBy('date_start_actualite', 'desc')->orderBy('heure_start_actualite', 'desc')->get();

    return ['choice' => $choice, 'actualites' => $actualites];
  }

  public function actualiteDetail($path){

    $file = [];
    $breadcrumb = [];

    $file['name'] = 'ACTUALITES';
    $file['url'] = '/actualites';
    array_push( $breadcrumb, $file);
    $actualiteDetail =Actualite::where('url_canonical_actualite', '/'.$path)->get();
  
    return ['actualiteDetail' => $actualiteDetail, 'breadcrumb' => $breadcrumb];
  }
}
