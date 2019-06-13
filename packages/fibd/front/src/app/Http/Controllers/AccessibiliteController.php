<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccessibiliteController extends Controller
{
  public function index() {

    return view('front::pages.Accessibilite');
  }

}
