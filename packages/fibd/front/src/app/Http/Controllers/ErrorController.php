<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;

class ErrorController extends Controller {

   public function index(Request $request) {
     $link_error = SiteCategorie::where('is_404_categoriePage', 1)->get();
    return view('front::pages.404', compact('link_error'));
   }
}
