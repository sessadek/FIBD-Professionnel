<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\Selection;
use Fibd\Front\App\SelectionsAlbum;
use Fibd\Front\App\PageSite;
use Fibd\Front\App\Partenaire;
use Fibd\Front\App\Palmares;
use Fibd\Front\App\Programmation;
use Fibd\Front\App\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

trait PalmaresTrait
{

  public function palmares($path){
    $data = $this->breadcrumb($path);
    $breadcrumb = $data['breadcrumb'];

    $palmares = SiteCategorie::where('url_categoriePage', '/'.$path)->get();
    $officiel = Palmares::where('delete_prixPalmares', 0)->orderBy('ordre_prixPalmares', 'asc')->get();
    $attribution_without_Album_selection = DB::table('ligne_albums_prix_palmares')->where('id_albumSelection', 0)->get();

    return ['officiel'=> $officiel, 'palmares' => $palmares, 'breadcrumb' => $breadcrumb];
  }

  public function palmaresAlbum($path){
    $data = $this->breadcrumb($path);

    $breadcrumb = $data['breadcrumb'];

    $detailAlbum = SelectionsAlbum::where('url_albumSelection', $path)->get();
    $fonctionAuteur = DB::table('bo_selections_auteurs_fonctions')->where('delete_fonctionAuteur', 0)->get();
    $tabListeFonction=collect($fonctionAuteur)->keyBy('id_fonctionAuteur');
    foreach($tabListeFonction as $key_fonction=>$value_fonction){
      foreach($detailAlbum[0]->auteur as $valueAuteur){
        if($valueAuteur->id_fonctionAuteur == $key_fonction){
          if(!isset($arrayConcepteur[$key_fonction])){
            $arrayConcepteur[$key_fonction]['libelle']=$value_fonction->libelle_fonctionAuteur;
            $arrayConcepteur[$key_fonction]['liste']='';
          }
          $arrayConcepteur[$key_fonction]['liste'].=$valueAuteur->prenom_auteurSelection.' '.$valueAuteur->nom_auteurSelection.' / ';
        }
      }
      if(isset($arrayConcepteur[$key_fonction]['liste'])){
        $arrayConcepteur[$key_fonction]['liste']=substr($arrayConcepteur[$key_fonction]['liste'],0,-3);
      }
    }
    return ['detailAlbum'=> $detailAlbum, 'arrayConcepteur' => $arrayConcepteur, 'breadcrumb' => $breadcrumb];
  }

  public function selection($path){
    $data = $this->breadcrumb($path);
    $breadcrumb = $data['breadcrumb'];
    $partenaire = $data['partenaire'];

    $palmares = SiteCategorie::where('url_categoriePage', '/'.$path)->get();
    $officiel = Selection::where('libelle_selection', $palmares[0]->libelle_categoriePage)->get();
    return ['partenaire'=> $partenaire, 'palmares' => $palmares, 'officiel' => $officiel, 'breadcrumb' => $breadcrumb];
  }

  function breadcrumb($path){
    $url_previous = URL::previous();
    $url = '';
    $file = [];
    $breadcrumb = [];
    $value = $path;
    $value_parent = SiteCategorie::where('url_categoriePage', '/'.$value)->get();

    if(count($value_parent) > 0){
      $id_parent = $value_parent[0]->id_categoriePage;
      while($id_parent !== 0){
        $name = SiteCategorie::where('id_categoriePage', $id_parent)->get();

        $file['name'] = $name[0]->titre_categoriePage;
        $file['url'] = $name[0]->url_categoriePage;
        array_push( $breadcrumb, $file);
        $id_parent = $name[0]->id_parent;
      }
      $breadcrumb = array_reverse($breadcrumb);
    } else {

      $categorie_bread = explode('/', $url_previous);
      $categorie = SiteCategorie::where('url_categoriePage', '/'.$categorie_bread[count($categorie_bread)-1])->get();
      if(count($categorie) > 0){
        $id_parent = $categorie[0]->id_categoriePage;
        while($id_parent !== 0){
          $name = SiteCategorie::where('id_categoriePage', $id_parent)->get();
          $file['name'] = $name[0]->titre_categoriePage;
          $file['url'] = $name[0]->url_categoriePage;
          array_push( $breadcrumb, $file);
          $id_parent = $name[0]->id_parent;
        }
        $breadcrumb = array_reverse($breadcrumb);
      } else {
        $name = [];
      }
    }

    if(count($name) !== 0){
      $partenaire = $name[0]->partenaire;
    } else {
      $partenaire =[];
    }

    return ['partenaire'=> $partenaire, 'breadcrumb' => $breadcrumb];
  }
  public function extract_path($path){
    $array_path = explode('/', $path);
    array_shift($array_path);
    $new_path = implode('/', $array_path);

    return $new_path;
  }
}
