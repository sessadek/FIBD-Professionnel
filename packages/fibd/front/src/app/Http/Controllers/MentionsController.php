<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\PageSite;

class MentionsController extends Controller
{
  public function index(Request $request){
  
    $path = substr($request->path(), 3);
    $choice = SiteCategorie::where('url_categoriePage', '/'.$path)->get();
    $detail = PageSite::where('id_categoriePage', $choice[0]->id_categoriePage)->get();

    return view('front::pages.mentions_legales', compact('detail', 'choice'));
  }
}
