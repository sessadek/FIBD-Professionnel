<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\SiteCategorie;
use Fibd\Front\App\PageSite;
use Fibd\Front\App\Lieux;
use Fibd\Front\App\Peggy;
use Fibd\Front\App\Contact;
use Fibd\Front\App\Programmation;
use Fibd\Front\App\Editeur;
use Fibd\Front\App\TypeProgrammation;
use Fibd\Front\App\Partenaire;
use Fibd\Front\App\Intervenant;
use Fibd\Front\App\Accreditation;
use Fibd\Front\App\Video;
use Fibd\Front\App\PartenaireType;
use Fibd\Front\App\PagesBlocs;
use Illuminate\Support\Facades\DB;
use Fibd\Front\App\SelectionsAlbum;

class GestionMenuController extends Controller
{
  use PalmaresTrait;
  use ActualitesTrait;

  public function index(Request $request, $menu, $sousMenu = '') {
    $newPath = $this->extract_path($request->path());

    $part = explode('/', $newPath);
    $url = '';
    $file = [];
    $choice_partenaire =[];
    $partenaire =[];

    $bread_data = $this->breadcrumb($menu);
    $breadcrumb = $bread_data['breadcrumb'];

    $lieux = Lieux::where('actif_lieu', 1)-> get();
    $public = Peggy::where('actif_public', 1)->orderBy('ordre_public', 'asc')-> get();

    $choice = SiteCategorie::where('is_publish_categoriePage', 1)->where('delete_categoriePage', 0)->where('url_categoriePage', '/'.$part[count($part)-1])->get();
    // echo('<pre>');
    // print_r($sousMenu);
    // echo('</pre>');
    // exit;
    if(isset($choice[0])){
      $choice_partenaire = SiteCategorie::where('url_categoriePage', '/'.$sousMenu)->get();
      $partenaire = $choice_partenaire[0]->partenaire;
    }

    if(!isset($choice[0])){

       $actu = $this->actualiteDetail($sousMenu);

      if (count($actu['actualiteDetail']) > 0) {
        $actualiteDetail = $actu['actualiteDetail'];
        $breadcrumb = $actu['breadcrumb'];
        return view('front::pages.actualite.ActualiteDetail', compact('actualiteDetail', 'breadcrumb'));
      } else {
        $detailprog = Programmation::where('url_programmation', '/'.$part[count($part)-1])->get();
        if(count($detailprog) > 0 ){
          if($detailprog[0]->liste_id_video){
            $videoArray = explode(';', $detailprog[0]->liste_id_video);
            $video = [];
            $listVideo = [];
            foreach($videoArray as $key => $value) {
              $video = Video::where('id_video', $value)->where('delete_video', 0)->get();
              array_push($listVideo, $video[0]);
            }
          }
          return view('front::pages.menu.DetailExposition', compact('partenaire', 'menu', 'sousMenu', 'detailprog', 'breadcrumb', 'lieux', 'public', 'listVideo'));

        } else {
          $data = $this->palmaresAlbum($sousMenu);
          $detailAlbum = $data['detailAlbum'];
          $arrayConcepteur = $data['arrayConcepteur'];
          $breadcrumb = $data['breadcrumb'];
          return view('front::pages.prixPalmares.prix_palmares_album', compact( 'detailAlbum', 'breadcrumb', 'arrayConcepteur'));
        }
      }
    } else if(count($choice[0]->children) >0){

      $countModulo = count($choice[0]->children)  % 3;
      $choiceNew = [];

      foreach($choice[0]->children as $value){
        array_push($choiceNew, $value);
      }

      if( $countModulo >0){
        $linkBlock = explode(';', $choice[0]->liste_link_categorie_categoriePage);


        if(count($linkBlock) > 1){
          for($i = 0;  $i<(3 - $countModulo); $i++){

            $addBlock = SiteCategorie::where('id_categoriePage', $linkBlock[$i])->where('delete_categoriePage', 0)->get();
            if(count($addBlock)>0){
            $arrayLign= $addBlock[0]->url_categoriePage;
            $id_parent = $addBlock[0]->id_parent;

            while($id_parent !== 0 ){
              $urlparent = SiteCategorie::where('id_categoriePage', $id_parent)->get();
              $arrayLign = $urlparent[0]->url_categoriePage.$arrayLign;
              $id_parent = $urlparent[0]->id_parent;
            }
            $addBlock[0]->url_add_block = $arrayLign;
            array_push($choiceNew, $addBlock[0]);
          }
          }
        }
      }

      $testSousMenu = explode('/', $sousMenu);
      if($testSousMenu[0] == 'lieux'){
        $sousMenu = '/'.$sousMenu;
      } else if($testSousMenu[0] =='spectacles-rencontres'){
        $sousMenu = '/'.$sousMenu;
      }


      return view('front::pages.menu.MenuPage', compact('partenaire', 'menu', 'sousMenu', 'choice','choiceNew', 'breadcrumb', 'lieux', 'public'));
    } else {

      switch($sousMenu){

        case 'expositions':

        $type = TypeProgrammation::where('libelle_typeProgrammation', 'Expositions')->get();
        $programmations = $type[0]->programmation;

        return view('front::pages.menu.ProgrammationPage', compact('partenaire', 'programmations', 'menu', 'sousMenu', 'choice', 'breadcrumb', 'lieux', 'public'));
        break;

        case 'autrices-auteurs':
        $intervenants = DB::select(
          'SELECT

          a.civilite_accredite,
          a.prenom_accredite,
          a.nom_accredite,
          c.libelle_libelleBadge,
          d.nom_societe,
          d.numero_stand_societe,
          e.libelle_lieuExposition
          FROM
          bo_accreditations_accredites a,
          bo_accreditations_badges b,
          bo_accreditations_badges_libelles c,
          bo_accreditations_societes d,
          bo_accreditations_lieux_expositions e
          WHERE
          a.id_accredite=b.id_accredite AND
          b.id_libelleBadge=c.id_libelleBadge AND
          e.id_lieuExposition=d.id_lieuExposition AND
          a.id_societe=d.id_societe AND
          c.use_in_front_libellePage =1
          ORDER BY
          a.nom_accredite, a.prenom_accredite
          '
        );
        // $intervenants = AccreditationAuteur::where('id_fonction', )->get();

        return view('front::pages.menu.listeAuteur', compact('partenaire', 'intervenants', 'menu', 'sousMenu', 'choice', 'breadcrumb', 'lieux', 'public'));
        break;

        case 'editeurs-exposants':
        $intervenants = Accreditation::orderBy('nom_societe', 'asc')->get();
        return view('front::pages.menu.listeEditeur', compact('partenaire', 'intervenants', 'menu', 'sousMenu', 'choice', 'breadcrumb', 'lieux', 'public'));
        break;
        case 'hebergement':
        return view('front::pages.infos.Hebergement', compact('page', 'id', 'breadcrumb'));
        break;
        case 'groupes-scolaires':
        $id = SiteCategorie::where('url_categoriePage', '/'.$menu)->get();
        $pagesite = PageSite::where('id_categoriePage', $id[0]->id_categoriePage)->get();
        $page = PagesBlocs::where('id_categoriePage', $id[0]->id_categoriePage)->orderBy('ordre_blocPage', 'asc')->get();
        return view('front::pages.infos.Groupe_Scolaire', compact('page', 'id', 'pagesite', 'breadcrumb'));
        break;
        case 'accessibilite-pmr':
        $choice = $id;
        return view('front::pages.infos.InfoMenu', compact( 'choice', 'page', 'breadcrumb'));
        break;
        case 'billetterie':
        return view('front::pages.infos.billeterie', compact('id', 'breadcrumb'));
        break;
        case 'contact':
        $contacts = Contact::where('actif_serviceMessagerie', 1)->where('delete_serviceMessagerie', 0)->orderBy('ordre_serviceMessagerie', 'asc')->get();
        return view('front::pages.infos.InfosPratique_Contact', compact('id', 'breadcrumb', 'contacts'));
        break;

        case 'venir-au-festival':
        return view('front::pages.infos.InfosPratique_festival', compact('id', 'breadcrumb'));
        break;

        case 'heure-par-heure':
        $id = SiteCategorie::where('url_categoriePage', '/'.$menu)->get();
        $timeline = Programmation::where('actif_programmation', 1)->where('is_interne_programmation', 0)->orderBy('date_start_programmation', 'asc')->orderBy('hour_start_programmation', 'asc')->get();
        $dateFest = DB::table('bo_editions_dates')->where('is_use_festival_dateEdition', 1)->get();
        $publicFest = DB::table('bo_programmations_publics')->where('delete_public', 0)->orderBy('ordre_public', 'asc')->get();
        $lieuFest = DB::table('bo_programmations_lieux')->where('ordre_lieu', 0)->get();
        $arrayline = [];
        $arrayType = [];
        $arrayLieu =[];

        foreach($timeline as $line){
          array_push($arrayType, $line->type);
          array_push($arrayLieu, $line->lieu);
        }
        $uniqType = collect(array_unique($arrayType));
        $uniqLieu = collect(array_unique($arrayLieu));
        $evenement = $uniqType->sortBy('libelle_typeProgrammation');
        $lieu = $uniqLieu->sortBy('libelle_lieu');

        for($x = 0; $x < count($dateFest); ++$x) {
          $arrayDay = [];
          array_push($arrayDay, $dateFest[$x]);
          for($i = 0; $i < count($timeline); ++$i) {
            if($dateFest[$x]->date_dateEdition == $timeline[$i]->date_start_programmation){
              // calcul de la duree
              $time_start = strtotime($timeline[$i]->hour_start_programmation);
              $time_end = strtotime($timeline[$i]->hour_end_programmation);
              $dureeHeure = gmdate("H", $time_end-$time_start);
              $dureeMinute = gmdate("i", $time_end-$time_start);
              $dureeScreen = '';
              if($dureeHeure > 0){
                $pluriel = ($dureeHeure > 1)?'s':'';
                $dureeScreen.= ($dureeHeure*1).' heure'.$pluriel;
              }
              if($dureeMinute > 0){
                $dureeScreen.= ' '.$dureeMinute;
                if($dureeHeure==0){
                  $dureeScreen.= ' minutes ';
                }
              }

              // $duree = gmdate("H \h i \m", $time_end-$time_start);
              $timeline[$i]->duree = $dureeScreen;
              // echo('<pre>duree: '.$duree.'</pre>');
              array_push($arrayDay, $timeline[$i]);
            }
          }
          array_push($arrayline, $arrayDay);
        }
        $startHeure = 7;
        $endHeure = 23;
        return view('front::pages.infos.InfosPratique_heure', compact('id', 'arrayline', 'dateFest', 'publicFest', 'evenement', 'lieu', 'startHeure', 'endHeure'));
        break;
        case 'palmares-officiel':
        $data = $this->palmares($menu);
        $officiel = $data['officiel'];
        $palmares = $data['palmares'];
        $breadcrumb = $data['breadcrumb'];
        return view('front::pages.prixPalmares.prix_palmares_prix', compact( 'officiel', 'palmares', 'breadcrumb'));
        break;
        case 'selection-officielle';
        case 'selection-jeunesse';
        case 'selection-fauve-polar-sncf';
        case 'selection-patrimoine':
        $data = $this->selection($menu);
        $officiel = $data['officiel'];
        $palmares = $data['palmares'];
        $breadcrumb = $data['breadcrumb'];
        $partenaire = $data['partenaire'];
        return view('front::pages.prixPalmares.prix_palmares_selection', compact('partenaire', 'palmares', 'officiel', 'breadcrumb'));
        break;
        case 'actualites':
        $data = $this->listActualites($menu);
        $choice = $data['choice'];
        $actualites = $data['actualites'];
        return view('front::pages.actualite.Actualites', compact('choice', 'actualites'));
        break;
        case 'prives';
        case 'institutionnels':
        $choice = SiteCategorie::where('url_categoriePage', '/'.$menu)->get();
        $type = PartenaireType::where('id_typePartenaire', $choice[0]->id_typePartenaire)->where('delete_typePartenaire', 0)->get();

        return view('front::pages.partenaire.partenaire_prive', compact('choice', 'type'));
        break;
        default:
        $detail = PageSite::where('id_categoriePage', $choice[0]->id_categoriePage)->get();

        return view('front::pages.menu.DetailPage', compact('menu', 'sousMenu', 'choice', 'detail', 'breadcrumb'));
        break;
      }

    }

  }

  public function detailHeure(Request $request){

    $part = explode('/', $request->path());
    $url = '';
    $file = [];
    $breadcrumb = [];

    foreach ($part as $value) {
      $name = SiteCategorie::where('url_categoriePage', '/'.$value)->get();
      if(count($name) !== 0 ) {
        $url = $url.'/'.$value;
        $file['name'] = $name[0]->titre_categoriePage;
        $file['url'] = $url;
        array_push( $breadcrumb, $file);
      }
    }

    $lieux = Lieux::where('actif_lieu', 1)-> get();
    $public = Peggy::where('actif_public', 1)->orderBy('ordre_public', 'asc')-> get();

    $detailprog = Programmation::where('url_programmation', '/'.$part[count($part)-1])->get();

    return view('front::pages.menu.DetailExposition', compact('detailprog', 'breadcrumb', 'lieux', 'public'));
  }
}
