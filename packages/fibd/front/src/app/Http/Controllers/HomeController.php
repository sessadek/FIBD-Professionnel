<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Partenaire;
use Fibd\Front\App\Slider;

class HomeController extends Controller
{
  use PalmaresTrait;
  public function index(Request $request) {

    $newPath = $this->extract_path($request->path());

    $link = SiteCategorie::get();
    $choice = SiteCategorie::where('url_categoriePage', '/'.$newPath)->get();
    $partenaire = $choice[0]->partenaire;
    $menuFile = SiteCategorie::where('is_home_bloc_categoriePage', 1)->orderBy('ordre_home_bloc_categoriePage', 'asc')->get();
    $sliders = Slider::orderBy('ordre_slide', 'asc')->where('delete_slide', 0)->where('actif_slide', 1)->where('id_slider', 1)->get();

    return view('front::pages.default.Home', compact('choice', 'partenaire', 'menuFile', 'sliders'));
  }

  public function language(Request $request)
	{

    $locale = $request['lang'];

    $request->session()->put('locale', $locale);
    $request->session()->save();
    app()->setLocale($locale);
    // echo('<pre>');
    // print_r($request->session()->get('locale'));
    // echo('</pre>');
    // exit;
		return response()->json($locale);
	}


}
