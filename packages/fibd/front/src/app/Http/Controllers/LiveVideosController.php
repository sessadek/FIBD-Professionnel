<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\LiveVideos;


class LiveVideosController extends Controller{

	public function index(Request $request) {
		$part = explode('/', $request->path());

		$choice=SiteCategorie::where('url_categoriePage', '/'.$part[count($part)-1])->get();
		if(count($choice)==0){
			$choice=[];
			$choice[0]=(object) array();
			$choice[0]->titre_categoriePage=' Live Videos ';
			$choice[0]->description_categoriePage=' Live Videos ';
		}
		$liveVideos=(object) array();
		$liveVideos=LiveVideos::where('is_live_video', 1)->where('delete_video', 0)->where('actif_video', 1)->orderBy('date_debut_video', 'desc')->orderBy('heure_debut_video', 'desc')->get();
	return view('front::pages.live-videos', compact('choice', 'liveVideos'));
	}
}
