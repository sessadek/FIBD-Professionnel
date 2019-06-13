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
class AlbumPage extends Model
{
  protected $table = 'bo_selections_albums_pages';
  protected $primaryKey = 'id_pageAlbum';

  public function media() {
    return $this->hasOne(Media::class, 'id_media', 'id_media');
  }

}
