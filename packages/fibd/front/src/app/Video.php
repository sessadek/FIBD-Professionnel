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
class Video extends Model
{
  protected $table = 'bo_videos';
  protected $primaryKey = 'id_video';

}
