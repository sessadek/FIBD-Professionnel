<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller {

   public function setCookie(Request $request) {

      $minutes = 365*60*24;
      $response = new Response('FIBDCookie');
      $response->withCookie(cookie('Fibd2019', 'acceptation cookie', $minutes));
      return $response;
   }
}
