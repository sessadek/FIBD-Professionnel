<?php

namespace Fibd\Front\App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Fibd\Front\App\Contact;

class NewslettersController extends Controller
{
  public function index(Request $request) {

    $ip = $request->ips();
    $content=file_get_contents(
      'https://manager.bdangouleme.com/action_ajax.php?class=messages&action=createInscriptionNewsletter&email='.$request['email'].'&confirm=1&ip='.$ip[0].'&api_key=fb121b52855586f26528bfe81f289591'
    );

    //https://manager.bdangouleme.com/action_ajax.php?class=messages&action=createInscriptionNewsletter&email=&confirm=1&ip=&api_key=fb121b52855586f26528bfe81f289591
    //0 : erreur du systeme , mettre un message inscription echoue , reessaye plus tard....
    //1 : inscription avec succes
    //2 : deja inscrit
    switch ($content) {

      case '1':
        $result = "Vous êtes bien inscrit à la newsletter du Festival";

      break;
      case '2':
        $result = "Vous êtes déjà inscrit à la newsletter du Festival";

      break;
      default:
        $result ="Une erreur est survenue. Merci de réessayer dans quelques minutes.";
      break;
    };
    return response()->json($result);

  }

  public function contact(Request $request){
    $contacts = Contact::where('id_serviceMessagerie', $request['serviceContact'])->where('actif_serviceMessagerie', 1)->where('delete_serviceMessagerie', 0)->orderBy('ordre_serviceMessagerie', 'asc')->get();
    echo('<pre>');
    print_r($contacts);
    echo('<pre>');
    exit;
    return redirect('contact')->with('status', 'Votre message a bien été envoyé. Vous serez contacté dans les plus bref delais.')
  }

}
