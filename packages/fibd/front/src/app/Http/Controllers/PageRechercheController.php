<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\Programmation;
use Fibd\Front\App\Actualite;
use Fibd\Front\App\SelectionsAlbum;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Media;

class PageRechercheController extends Controller
{
  public function index(Request $request) {
    $display_search = [];
    $programmation_result = [];
    $actualites_result = [];
    $albums_result = [];
    $infos_result = [];

    $programmations = Programmation::where('libelle_programmation', 'like', '%'.$request['search'].'%')->get();
    $actualites = Actualite::where('description_courte_actualite', 'like', '%'.$request['search'].'%')->get();
    $albums = SelectionsAlbum::join('ligne_selections_auteurs_albums', 'bo_selections_albums.id_albumSelection', '=', 'ligne_selections_auteurs_albums.id_albumSelection' )
                              ->join('bo_selections_auteurs', 'ligne_selections_auteurs_albums.id_auteurSelection', '=', 'bo_selections_auteurs.id_auteurSelection')
                              ->where('bo_selections_auteurs.prenom_auteurSelection', 'like', '%'.$request['search'].'%')->get();
    $infos_pratiques = SiteCategorie::where('id_parent', 3)->where('delete_categoriePage', 0)->get();
    $medias = Media::where('libelle_media', 'like', '%'.$request['search'].'%')->get();

    foreach($infos_pratiques as $info){
      $pratiques = SiteCategorie::where('bo_sites_categories.id_categoriePage', $info->id_categoriePage)
                                  ->join('bo_sites_pages_blocs', 'bo_sites_categories.id_categoriePage', 'bo_sites_pages_blocs.id_categoriePage')
                                  ->where('bo_sites_pages_blocs.description_blocPage', 'like', '%'.$request['search'].'%')->get();
      if(count($pratiques) > 0){
        foreach($pratiques as $pratique){
          $unit['titre'] = $pratique->titre_categoriePage;
          $unit['description'] = $pratique->description_blocPage;
          $unit['media'] = $pratique->media;
          $unit['url'] = $pratique->url_categoriePage;
          array_push($infos_result, $unit);

        }
      }
    }

    //Programmations
    foreach ($programmations as $programmation) {
      $unit['titre'] = $programmation->titre_programmation;
      $unit['description'] = $programmation->small_description_programmation;
      $unit['media'] = $programmation->media;
      $unit['url'] = $programmation->url_programmation;
      array_push($programmation_result, $unit);
    }

    //Actualites
    foreach ($actualites as $actualite) {
      $unit['titre'] = $actualite->titre_actualite;
      $unit['description'] = $actualite->description_courte_actualite;
      $unit['media'] = $actualite->media;
      $unit['url'] = $actualite->url_canonical_actualite;
      array_push($actualites_result, $unit);
    }

    //Albums
    foreach ($albums as $album) {
      $unit['titre'] = $album->libelle_albumSelection;
      $unit['description'] = $album->description_albumSelection;
      $unit['media'] = $album->media;
      $unit['url'] = $album->url_albumSelection;
      array_push($albums_result, $unit);
    }
    $display_search['programmation'] = $programmation_result;
    $display_search['Actualite'] = $actualites_result;
    $display_search['Album'] = $albums_result;
    $display_search['infos_pratiques'] = $infos_result;
    $display_search['medias'] = $medias;

    return view('front::pages.recherche.page_recherche', compact('display_search'));
  }
  
  public function complete(Request $request){
    $array_word = [];
    $programmations = Programmation::where('libelle_programmation', 'like', '%'.$request['value'].'%')->pluck('libelle_programmation')->toArray();

    foreach($programmations as $programmation){
      $check_word = explode(' ', $programmation);
      foreach ($check_word as $value) {
        if(stripos($value, $request['value']) ||  stripos($value, $request['value']) === 0){
          array_push($array_word, $value);
        }
      }
    }
    return $array_word;
  }
}
