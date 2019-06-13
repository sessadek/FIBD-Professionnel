<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Fibd\Front\App\PagesBlocs;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Programmation;
use Fibd\Front\App\PageSite;
use Fibd\Front\App\Contact;

class InfosPratiqueController extends Controller
{

  public function access(Request $request) {

    $part = explode('/', $request->path());
    $url = '';
    $file = [];
    $breadcrumb = [];

    foreach ($part as $value) {
      $name = SiteCategorie::where('is_publish_categoriePage', 1)->where('delete_categoriePage', 0)->where('url_categoriePage', '/'.$value)->get();
      if(count($name) !== 0 ) {
        $url = $url.'/'.$value;
        $file['name'] = $name[0]->titre_categoriePage;
        $file['url'] = $url;
        array_push( $breadcrumb, $file);
      }
    }
    $choice = SiteCategorie::where('is_publish_categoriePage', 1)->where('delete_categoriePage', 0)->where('url_categoriePage', '/'.$part[count($part)-1])->get();
    $page = PagesBlocs::where('id_categoriePage', $choice[0]->id_categoriePage)->orderBy('ordre_blocPage', 'asc')->get();

    if($part[count($part)-1] == 'preparation-sejour-pmr'){
      return view('front::pages.infos.InfosPratique_sejour', compact('choice', 'page', 'breadcrumb'));

    } else {
      return view('front::pages.infos.InfosPratique_accessibilite', compact('choice', 'page', 'breadcrumb'));

    }
    return view('front::pages.infos.InfosPratique_accessibilite', compact('choice', 'page', 'breadcrumb'));
  }
}
