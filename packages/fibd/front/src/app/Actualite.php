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
class Actualite extends Model
{
  protected $table = 'bo_actualites';
  protected $primaryKey = 'id_actualite';

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

  public function video() {
    return $this->hasOne(Video::class, 'id_video', 'id_video');
  }

}
