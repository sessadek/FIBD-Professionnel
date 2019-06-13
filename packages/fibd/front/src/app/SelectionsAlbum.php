<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\SelectionsAlbum;
use Fibd\Front\App\Media;
use Fibd\Front\App\Editeur;
use Fibd\Front\App\Auteur;
/**
 *
 */
class SelectionsAlbum extends Model
{
  protected $table = 'bo_selections_albums';
  protected $primaryKey = 'id_albumSelection';

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }
  public function mediaBackground() {
    return $this->hasOne(Media::class, 'id_media', 'id_media_background');
  }
  public function editeur(){
    return $this->hasOne(Editeur::class, 'id_editeurSelection', 'id_editeurSelection');
  }
  public function auteur(){
    return $this->belongsToMany(Auteur::class, 'ligne_selections_auteurs_albums', 'id_albumSelection', 'id_auteurSelection');
  }
  public function carousel(){
    return $this->hasMany(AlbumPage::class, 'id_albumSelection', 'id_albumSelection');
  }
  public function metadata(){
    return $this->hasOne(MetaData::class, 'id_metaData', 'id_metaData');
  }
}
