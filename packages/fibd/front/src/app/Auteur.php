<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\Media;

/**
 *
 */
class Auteur extends Model
{
  protected $table = 'bo_selections_auteurs';
  protected $primaryKey = 'id_auteurSelection';

  public function album(){
    return $this->belongsToMany('SelectionsAlbum', 'ligne_selections_auteurs_albums');
  }
  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

  public function fonctionAuteur(){
    return $this->hasOne(FonctionAuteur::class, 'id_fonctionAuteur', 'id_fonctionAuteur');
  }
}
