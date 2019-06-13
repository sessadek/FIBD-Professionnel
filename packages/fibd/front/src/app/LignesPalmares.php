<?php
namespace Fibd\Front\App;

use Illuminate\Database\Eloquent\Model;
use Fibd\Front\App\SelectionsAlbum;
use Fibd\Front\App\Media;

/**
 *
 */
class LignesPalmares extends Model
{
  protected $table = 'ligne_albums_prix_palmares';
  protected $primaryKey = 'id_albumPrixPalmares';

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

}
